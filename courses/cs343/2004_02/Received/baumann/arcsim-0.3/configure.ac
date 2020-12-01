## Process this file with autoconf to produce a configure script.

# Initialize autoconf.
AC_PREREQ(2.59)
AC_INIT(arcsim, 0.3)
AC_CONFIG_SRCDIR(src/arcsim.c)
AC_CONFIG_HEADER(include/config.h)

# Initialize automake.
AM_INIT_AUTOMAKE

# Checks for programs.
AC_PROG_CC(gcc)
AC_PROG_INSTALL

# Determine the size of the int and long types on the target machine.
AC_COMPILE_CHECK_SIZEOF(int)
AC_COMPILE_CHECK_SIZEOF(long)

# Determine the endianess of the target machine.
AC_C_BIGENDIAN_CROSS

# Make things easier to debug.
CFLAGS="-g -W -Wall"

# Set output files.
AC_CONFIG_FILES([Makefile
                 include/Makefile
                 src/Makefile])
AC_OUTPUT
