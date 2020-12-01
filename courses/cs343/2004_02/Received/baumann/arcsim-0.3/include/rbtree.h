/*
 * rbtree.h - Red-Black Tree
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

#ifndef	_RBTREE_H
#define	_RBTREE_H

#include <stdbool.h>

#ifdef	__cplusplus
extern	"C" {
#endif

/* opaque declaration of red-black tree structure */
typedef struct _tag_rbtree rbtree;

/* comparison function for searching red-black trees */
typedef int (*rbtree_op_compare) (void *key, void *item);

/* function for free'ing items stored in red-black trees */
typedef void (*rbtree_op_free) (void *item);



/*
 * Constructor.
 *
 * compare_func: comparison function for searching the tree
 * free_func: function for free'ing items stored in the tree
 *
 * returns null if either argument is null or if allocation failed, otherwise
 * returns the new tree
 */
rbtree *rbtree_init(rbtree_op_compare compare_func, rbtree_op_free free_func);

/*
 * Search the tree for a specific item.
 *
 * self: the tree to be searched
 * key: the key to search on
 *
 * returns null if the item is not found, otherwise returns the item
 */
void *rbtree_search(rbtree *self, void *key);

/*
 * Insert an item into the tree.
 *
 * self: the tree into which the insertion should be made
 * key: the key for the item
 * item: the item to be inserted
 *
 * returns true on success, false otherwise
 */
bool rbtree_insert(rbtree *self, void *key, void *item);

/*
 * Free the tree, calling the rbtree_op_free supplied on init for each item.
 *
 * self: the tree to be free'd
 */
void rbtree_free(rbtree *self);

#ifdef	__cplusplus
};
#endif

#endif	/* _RBTREE_H */
