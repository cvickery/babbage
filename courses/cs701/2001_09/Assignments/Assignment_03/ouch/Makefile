# $Id: Makefile,v 1.4 2001/10/12 16:13:09 vickery Exp vickery $

#   $Log: Makefile,v $
#   Revision 1.4  2001/10/12 16:13:09  vickery
#   Updated dependencies.
#
#   Revision 1.3  2001/10/11 20:00:24  vickery
#   Added .o and .bak files to clean rule.
#
#   Revision 1.2  2001/10/11 19:57:34  vickery
#   Added depend and default rules; ran depend.
#
#   Revision 1.1  2001/10/04 19:40:43  vickery
#   Initial revision
#

LDFLAGS = -g
SRCS    = ouch.cc
HDRS    = ouch.h

default : ouch

clean   :
	rcsclean
	rm -f core *.o *.bak ouch

depend  : $(SRCS) $(HDRS)
	makedepend -- $(CXXFLAGS) -- $(SRCS)


# DO NOT DELETE

ouch.o: ouch.h /usr/include/assert.h /usr/include/errno.h
ouch.o: /usr/include/sys/errno.h /usr/include/limits.h
ouch.o: /usr/include/sys/feature_tests.h /usr/include/sys/isa_defs.h
ouch.o: /usr/include/sys/stat.h /usr/include/sys/types.h
ouch.o: /usr/include/sys/machtypes.h /usr/include/sys/int_types.h
ouch.o: /usr/include/sys/select.h /usr/include/sys/time.h
ouch.o: /usr/include/sys/time.h /usr/include/sys/time_impl.h
ouch.o: /usr/include/stdio.h /usr/include/sys/va_list.h
ouch.o: /usr/include/stdio_tag.h /usr/include/stdio_impl.h
ouch.o: /usr/include/stdlib.h /usr/include/string.h /usr/include/unistd.h
ouch.o: /usr/include/sys/unistd.h
