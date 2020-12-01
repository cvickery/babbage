/*
 * main.c - ARC Simulator Entry Point
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
#include <stdio.h>
#include "arcsim.h"

#ifdef	__cplusplus
extern	"C" {
#endif

int
main(int argc, char *argv[])
{
	arcsim *sim;

	/* TODO - handle help and version arguments */
	if(argc == 1)
	{
		/* initialize the simulator */
		sim = arcsim_init();
		if(sim == NULL) { exit(1); }

		/* run the simulator */
		arcsim_main(sim);
	}
	else
	{
		fprintf(stderr, "argument processing not implemented yet");
		exit(1);
	}

	/* exit successfully */
	exit(0);
}

#ifdef	__cplusplus
};
#endif
