/*
 * index.h - ARC Information Index
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

#ifndef	_ARC_INDEX_H
#define	_ARC_INDEX_H

#include <stdbool.h>
#include "values.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* opaque declaration of the arc simulator index structure */
typedef struct _tag_arcsim_index arcsim_index;

/* structure of arc simulator index information */
typedef struct _tag_arcsim_index_info arcsim_index_info;
struct _tag_arcsim_index_info
{
	const char *label;
	int         data;
};

/*
 * Constructor.
 *
 * returns null if allocation failed, otherwise returns the new index
 */
arcsim_index *arcsim_index_init(void);

/*
 * Look up the information in the index which matches the given name.
 *
 * self: the index to be searched
 * label: the label of the information to retrieve
 *
 * returns null if the information is not found, otherwise returns the
 * information
 */
arcsim_index_info *arcsim_index_lookup(arcsim_index *self, char *label);

/*
 * Register the information in the index.
 *
 * self: the index in which to register the information
 * info: the information to register
 *
 * returns false if the information is already registered or if allocation
 * failed, otherwise returns true
 */
bool arcsim_index_register(arcsim_index *self, arcsim_index_info *info);

/*
 * Free the index.
 *
 * self: the index to be free'd
 */
void arcsim_index_free(arcsim_index *self);

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_INDEX_H */
