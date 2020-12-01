#!/bin/sh
#
# auto_gen.sh - Generate the configure script and *.in files.
#
# Copyright (C) 2004  Richard Baumann
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

# The Debian package maintainers for aclocal and automake have basically broken
# autoreconf by insisting on keeping the 'aclocal' and 'automake' programs at
# version 1.4. The newer versions have the version number appended to their
# binaries, which autoreconf isn't smart enough to figure out. Since I don't
# like the idea of using deprecated autoconf macros in my configure.ac file,
# which using aclocal/automake 1.4 would require, I wrote this script to do
# autoreconf's job, while calling the correct versions of aclocal/automake.
# Yes, I could've purged the 1.4 versions and then symlinked, but, despite
# their tendency to piss me off, I like to keep things in /usr as the Debian
# package maintainers intended.

# Run aclocal to update the macros.
aclocal-1.7

# Run autoheader to generate config.h.in.
autoheader

# Run automake to generate the Makefile.in files.
automake-1.7 --add-missing --copy

# Run autoconf to generate the configure script.
autoconf

# Exit successfully
exit 0
