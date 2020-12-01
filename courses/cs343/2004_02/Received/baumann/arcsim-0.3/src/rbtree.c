/*
 * rbtree.c - Red-Black Tree
 *
 * Copyright (C) 2004  Richard Baumann
 * Copyright (C) 2001  Southern Storm Software, Pty Ltd.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

#include <stdlib.h>
#include <stddef.h>
#include "rbtree_private.h"

#ifdef	__cplusplus
extern	"C" {
#endif

rbtree *
rbtree_init(rbtree_op_compare compare_func, rbtree_op_free free_func)
{
	rbtree *self;

	/* argument check */
	if(compare_func == NULL || free_func == NULL) { return NULL; }

	/* allocate */
	self = (rbtree *)malloc(sizeof(rbtree));
	if(self == NULL) { return NULL; }

	/* initialize data */
	self->_head._left = NULL;
	self->_head._right = &(self->_null);
	self->_head._red = false;
	self->_null._left = &(self->_null);
	self->_null._right = &(self->_null);
	self->_null._red = false;
	self->_comp = compare_func;
	self->_free = free_func;

	/* return new tree */
	return self;
}

void *
rbtree_search(rbtree *self, void *key)
{
	rbtree_node *node;
	rbtree_node *_null;
	int cmp;

	/* search the tree */
	_null = &(self->_null);
	node = self->_head._right;
	while(node != _null)
	{
		cmp = (*(self->_comp))(key, node->_item);
		if(cmp == 0)
		{
			return node->_item;
		}
		else if(cmp < 0)
		{
			node = node->_left;
		}
		else
		{
			node = node->_right;
		}
	}

	/* item not found */
	return NULL;
}

bool
rbtree_insert(rbtree *self, void *key, void *item)
{
	rbtree_node *greatgrandparent;
	rbtree_node *grandparent;
	rbtree_node *parent;
	rbtree_node *current;
	rbtree_node *node;
	rbtree_node *_null;

	/* attempt to allocate the new node */
	node = rbtree_node_init(self, item);
	if(node == NULL) { return false; }

	/* search for the insert position */
	_null = &(self->_null);
	current = &(self->_head);
	greatgrandparent = current;
	grandparent = current;
	parent = current;
	while(current != _null)
	{
		/* adjust the ancestor pointers */
		greatgrandparent = grandparent;
		grandparent = parent;
		parent = current;

		/* compare the key against the current node */
		if(rbtree_compare(self, key, current) < 0)
		{
			current = current->_left;
		}
		else
		{
			current = current->_right;
		}

		/* deal with red siblings along the path to the insert position */
		if(current->_left->_red && current->_right->_red)
		{
			/* recolor now to avoid a double-red cascade up the tree later */
			current->_red = true;
			current->_left->_red = false;
			current->_right->_red = false;

			/* handle potential double red case */
			rbtree_doublered
				(self, key, &current, &parent, &grandparent, &greatgrandparent);
		}
	}

	/* insert the new node into the current position */
	if(rbtree_compare(self, key, parent) < 0)
	{
		parent->_left = node;
	}
	else
	{
		parent->_right = node;
	}

	/* handle potential double red case */
	rbtree_doublered
		(self, key, &current, &parent, &grandparent, &greatgrandparent);

	/* ensure root node is still black */
	self->_head._right->_red = false;

	/* insertion succeeded */
	return true;
}

void
rbtree_free(rbtree *self)
{
	/* free the nodes */
	if(self->_head._right != &(self->_null))
	{
		rbtree_node_free(self->_head._right, self->_free, &(self->_null));
	}
	self->_head._right = NULL;
	self->_comp = NULL;
	self->_free = NULL;

	/* free the tree */
	free(self);
}

static rbtree_node *
rbtree_node_init(rbtree *tree, void *item)
{
	rbtree_node *self;

	/* allocate */
	self = (rbtree_node *)malloc(sizeof(rbtree_node));
	if(self == NULL) { return NULL; }

	/* initialize data */
	self->_left = &(tree->_null);
	self->_right = &(tree->_null);
	self->_red = true;
	self->_item = item;

	/* return new node */
	return self;
}

static int
rbtree_compare(rbtree *self, void *key, rbtree_node *node)
{
	/* the sentinel nodes are always less than other nodes */
	if(node == &(self->_head) || node == &(self->_null))
	{
		return 1;
	}
	else
	{
		return (*(self->_comp))(key, node->_item);
	}
}

static rbtree_node *
rbtree_rotate(rbtree *self, void *key, rbtree_node *around)
{
	rbtree_node *child;
	rbtree_node *grandchild;
	bool setleft;

	/* find the child of the around node on the rotate path */
	if(rbtree_compare(self, key, around) < 0)
	{
		child = around->_left;
		setleft = true;
	}
	else
	{
		child = around->_right;
		setleft = false;
	}

	/* swap the positions of the child, grand child, and great grand child */
	if(rbtree_compare(self, key, child) < 0)
	{
		grandchild = child->_left;
		child->_left = grandchild->_right;
		grandchild->_right = child;
	}
	else
	{
		grandchild = child->_right;
		child->_right = grandchild->_left;
		grandchild->_left = child;
	}

	/* swap the positions of the child and grand child */
	if(setleft)
	{
		around->_left = grandchild;
	}
	else
	{
		around->_right = grandchild;
	}

	/* return the new child of the around node */
	return grandchild;
}

static void
rbtree_doublered
	(rbtree *self, void *key, rbtree_node **current, rbtree_node **parent,
	 rbtree_node **grandparent, rbtree_node **greatgrandparent)
{
	int cmp_gp;
	int cmp_p;

	/*
	 * () = red
	 * [] = black
	 *
	 *
	 * recolor:
	 *
	 *       [p]            [p]
	 *        |              |
	 *       [q]            (q)
	 *        |     ---\     |
	 *       (r)    ---/    (r)
	 *        |              |
	 *       (s)            (s)
	 *
	 *
	 *
	 * restructure:
	 *
	 * if((cmp_gp < 0) != (cmp_p < 0))
	 * {
	 *      [a]           [a]        |      [a]             [a]
	 *       |             |         |       |               |
	 *      (b)           (b)        |      (b)             (b)
	 *        \     ---\    \        |      /     ---\      /
	 *        (c)   ---/    (d)      |    (c)     ---/    (c)
	 *        /               \      |      \             /
	 *      (d)               (c)    |      (d)         (d)
	 * }
	 *
	 *     [e]                       |      [e]
	 *      |               [e]      |       |            [e]
	 *     (f)      ---\     |       |      (f)   ---\     |
	 *       \      ---/    (g)      |      /     ---/    (g)
	 *       (g)            / \      |    (g)             / \
	 *         \          (f) (h)    |    /             (f) (h)
	 *         (h)                   |  (h)
	 *
	 *
	 *
	 * recolor:
	 *
	 *      [h]             [h]
	 *       |               |
	 *      (i)     ---\    [i]
	 *      / \     ---/    / \
	 *    (j) (k)         (j) (k)
	 *
	 */
	if((*parent)->_red)
	{
		/* recolor new child */
		(*grandparent)->_red = true;

		/* rotate to straighten section, if needed */
		cmp_gp = rbtree_compare(self, key, (*grandparent));
		cmp_p = rbtree_compare(self, key, (*parent));
		if((cmp_gp < 0) != (cmp_p < 0))
		{
			(*parent) = rbtree_rotate(self, key, (*grandparent));
		}

		/* rotate to eliminate double red */
		(*current) = rbtree_rotate(self, key, (*greatgrandparent));

		/* recolor new parent */
		(*current)->_red = false;
	}
}

static void
rbtree_node_free(rbtree_node *self, rbtree_op_free _free, rbtree_node *_null)
{
	/* free the left sub-tree */
	if(self->_left != _null)
	{
		rbtree_node_free(self->_left, _free, _null);
	}

	/* free the right sub-tree */
	if(self->_right != _null)
	{
		rbtree_node_free(self->_right, _free, _null);
	}

	/* free the item stored in this node, and then free this node */
	(*_free)(self->_item);
	free(self);
}

#ifdef	__cplusplus
};
#endif
