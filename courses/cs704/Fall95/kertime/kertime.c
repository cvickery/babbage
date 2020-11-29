/***>  kertime.c  <******************************************************
 *
 *
 *      This program illustrates iRMX and RMK time-related calls.
 *
 *      Christopher Vickery
 *      Fall 1995
 *
 */

/*  Standard Header Files  */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include <rmxc.h>
#include <rmk.h>

#include <sys/sysinfo.h>

/*  Manifest Constants  */

#define E_OK            (WORD_16)   0
#define ROOT_JOB        (BYTE)      3
#define WAIT_FOREVER    (WORD_16)   0xFFFF

#define DEFAULT_SLEEP               100

/*  main()
 *  ---------------------------------------------------------------------
 *
 *  SUMMARY
 *
 *      This is the main function for the only task of this job.  It
 *      demonstrates iRMX Kernel and Nucleus/BIOS timing functions.
 *
 *  ARGUMENTS
 *
 *      The standard ones for main().  Not used.
 *
 *  RETURN VALUE
 *
 *      Returns 0 if all calls complete normally.  Because exceptions
 *      are not handled in-line, the program will abort if any error
 *      occurs, so the program never returns a value other than 0.
 *
 *  ALGORITHM
 *
 *      1.  Determine the kernel tick ratio and display it.
 *      2.  Get the current kernel time, do a kernel sleep for a fixed
 *          number of ticks, get the kernel time again.  Display the
 *          difference.
 *      3.  Get the current BIOS time, do a Nucleus sleep for a fixed
 *          number of ticks, get the BIOS time again.  Display the
 *          difference.
 *      4.  Terminate.
 */

int
main(int argc, char *argv[])
{
    char            sysinfoName[] = "RQSYSINFO";
    UINT_64         kernelStart, kernelEnd;
    UINT_32         kernelSleepTime = DEFAULT_SLEEP;
    WORD_32         biosStart, biosEnd;
    WORD_16         biosSleepTime = DEFAULT_SLEEP;
    TOKEN           rootJob, sysinfoSelector;
    WORD_16         Status;
    SYSINFO_TYPE    *sysinfo;

    udistr(sysinfoName, sysinfoName);

    /*  Get the Kernel Tick Ratio for this system.  */

    rootJob = rqgettasktokens(ROOT_JOB, &Status);
    sysinfoSelector = rqlookupobject(   rootJob,
                                        sysinfoName,
                                        WAIT_FOREVER,
                                        &Status);
    sysinfo = buildptr(sysinfoSelector, (near *) 0);
    printf("Kernel Tick Ratio for this system is %d"
            " (%f msec per tick)\n",
            sysinfo->kn_tick_ratio,
            10.0 / (float) sysinfo->kn_tick_ratio);

    /*  Do a Kernel sleep  */

    kernelStart = KN_get_time();
    printf( "Kernel time is: %lu\n", kernelStart);
    printf( "Sleeping for %u ticks\n", kernelSleepTime);
    KN_sleep(kernelSleepTime);
    kernelEnd = KN_get_time();
    printf( "Kernel time is: %lu\n",    kernelEnd);

    /*  Do a Nucleus sleep */

    biosStart = rqgettime(&Status);
    rqsleep(biosSleepTime, &Status);
    biosEnd = rqgettime(&Status);
    printf( "BIOS time is: %u\n"
            "Sleeping for %u ticks\n"
            "BIOS time is: %u\n",      biosStart,
                                        biosSleepTime,
                                        biosEnd);

    /*  Terminate  */

    exit(0);
}
