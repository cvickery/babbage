#  Makefile for the kertime application

.obj:
	$(BND) $(CSTART), $(@).obj, &
	$(SD)intel/lib/cif$(MOD)32.lib, &
	$(SD)RMX386/lib/rmxif$(MOD)32.lib, &
	$(SD)RMX386/lib/kn_call.lib, $(SD)RMX386/lib/rmx_mux.lib &
	renameseg(code32 to code) $(TYPE) &
	segsize(stack(+8192)) rc(dm(10000,500000)) object($@) $(DEBUG)

kertime:
