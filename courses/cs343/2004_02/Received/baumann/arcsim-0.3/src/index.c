/*
 * index.c - ARC Information Index
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

#include <stdlib.h>
#include <stddef.h>
#include <string.h>
#include <stdio.h>
#include "index_private.h"

#ifdef	__cplusplus
extern	"C" {
#endif

arcsim_index *
arcsim_index_init(void)
{
	arcsim_index *self;

	/* allocate */
	self = (arcsim_index *)malloc(sizeof(arcsim_index));
	if(self == NULL)
	{
		perror("Initialization Failure");
		return NULL;
	}

	/* create the index tree */
	self->_info = rbtree_init(arcsim_index_info_compare, arcsim_index_info_free);
	if(self->_info == NULL)
	{
		perror("Initialization Failure");
		free(self);
		return NULL;
	}

	/* return new index */
	return self;
}

arcsim_index_info *
arcsim_index_lookup(arcsim_index *self, char *label)
{
	/* search for the information block with the given label */
	return (arcsim_index_info *)rbtree_search(self->_info, &label);
}

bool
arcsim_index_register(arcsim_index *self, arcsim_index_info *info)
{
	/* check for duplicate */
	if(rbtree_search(self->_info, &(info->label)) != NULL) { return false; }

	/* insert the info into the index tree */
	return rbtree_insert(self->_info, &(info->label), info);
}

void
arcsim_index_free(arcsim_index *self)
{
	/* free the tree */
	rbtree_free(self->_info);
	self->_info = NULL;

	/* free the index */
	free(self);
}

static int
arcsim_index_info_compare(void *key, void *item)
{
	return strcasecmp(*((char **)key), ((arcsim_index_info *)item)->label);
}

static void
arcsim_index_info_free(void *item)
{
	/* nothing to do here, so just keep the compiler quiet */
	item = NULL;
}

#ifdef	__cplusplus
};
#endif
