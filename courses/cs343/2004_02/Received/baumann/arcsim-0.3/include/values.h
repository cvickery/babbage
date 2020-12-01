/*
 * values.h - Basic Value Types
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

#ifndef	_ARC_VALUES_H
#define	_ARC_VALUES_H

#include "config.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* define the basic numeric types to keep things portable */
typedef signed char       int8;
typedef unsigned char     uint8;
typedef short             int16;
typedef unsigned short    uint16;
#if SIZEOF_INT == 4
	typedef int           int32;
	typedef unsigned int  uint32;
#else
	#if SIZEOF_LONG == 4
		typedef long          int32;
		typedef unsigned long uint32;
	#else
		#error "Cannot determine 32 bit integer type."
	#endif
#endif

#define ARC_VALUE_SWAP(x, y, type) \
		do { \
			type tmp; \
			tmp = x; \
			x = y; \
			y = tmp; \
		} while(0)

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_VALUES_H */
