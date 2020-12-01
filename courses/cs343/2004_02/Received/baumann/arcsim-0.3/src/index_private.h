/*
 * index_private.h - ARC Information Index
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

#ifndef	_ARC_INDEX_PRIVATE_H
#define	_ARC_INDEX_PRIVATE_H

#include "index.h"
#include "rbtree.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* structure of an arc simulator information index */
struct _tag_arcsim_index
{
	rbtree *_info;
};

/* compare an arc simulator information block to a label */
static int arcsim_index_info_compare(void *key, void *item);

/* free an arc simulator index information block (do nothing) */
static void arcsim_index_info_free(void *item);

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_INDEX_PRIVATE_H */
