/*
 * rbtree_private.h - Red-Black Tree
 *
 * Copyright (C) 2004  Richard Baumann
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

#ifndef	_RBTREE_PRIVATE_H
#define	_RBTREE_PRIVATE_H

#include "rbtree.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* structure of a red-black tree node */
typedef struct _tag_rbtree_node rbtree_node;
struct _tag_rbtree_node
{
	bool         _red;
	void        *_item;
	rbtree_node *_left;
	rbtree_node *_right;
};

/* structure of a red-black tree */
struct _tag_rbtree
{
	rbtree_node       _head;
	rbtree_node       _null;
	rbtree_op_compare _comp;
	rbtree_op_free    _free;
};

/* create a new red-black tree node */
static rbtree_node *rbtree_node_init(rbtree *tree, void *item);

/* compare the given node against the given key, taking sentinels into account */
static int rbtree_compare(rbtree *self, void *key, rbtree_node *node);

/* rotate a sub-tree around the given node, based on the given key */
static rbtree_node *rbtree_rotate(rbtree *self, void *key, rbtree_node *around);

/* deal with potential double reds */
static void rbtree_doublered
	(rbtree *self, void *key, rbtree_node **current, rbtree_node **parent,
	 rbtree_node **grandparent, rbtree_node **greatgrandparent);

/* free a red-black tree node, it's children, and their items */
static void rbtree_node_free
	(rbtree_node *self, rbtree_op_free _free, rbtree_node *_null);

#ifdef	__cplusplus
};
#endif

#endif	/* _RBTREE_PRIVATE_H */
