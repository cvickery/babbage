// $Id: EnumeratedVector.java,v 1.1 2007/01/12 04:36:48 vickery Exp $
/*
 * Created on Jan 11, 2007
 *
 *  Author:     C. Vickery
 *
 *  Copyright (c) 2007, Queens College of the City University
 *  of New York.  All rights reserved.
 *
 *  Redistribution and use in source and binary forms, with or
 *  without modification, are permitted provided that the
 *  following conditions are met:
 *
 *      * Redistributions of source code must retain the above
 *        copyright notice, this list of conditions and the
 *        following disclaimer.
 *
 *      * Redistributions in binary form must reproduce the
 *        above copyright notice, this list of conditions and
 *        the following disclaimer in the documentation and/or
 *        other materials provided with the distribution.
 *
 *      * Neither the name of Queens College of CUNY
 *        nor the names of its contributors may be used to
 *        endorse or promote products derived from this
 *        software without specific prior written permission.
 *
 *  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
 *  CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED
 *  WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 *  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 *  PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 *  OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 *  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 *  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR
 *  BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 *  LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 *  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT
 *  OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *  POSSIBILITY OF SUCH DAMAGE.
 *
 *  $Log: EnumeratedVector.java,v $
 *  Revision 1.1  2007/01/12 04:36:48  vickery
 *  Probabilistic downsampling didn't work so now the sampling ratemust be an integer divisor of the audio system's sampling rate ifthere is an audio system.  Added a command line option for disablingaudio system.
 *
 *
 */
import java.util.Enumeration;
import java.util.Vector;


//  Class EnumeratedVector
//  -----------------------------------------------------------------
/**
 *  This is a vector of Integers that lets you search for the closest
 *  match.
 * @author cvickery
 *
 */
  public class EnumeratedVector extends Vector<Integer>
  {
    public EnumeratedVector()
    {
      super();
    }
    public final static long serialVersionUID = 1L;
    Integer getClosest(int target)
    {
      if (this.elementCount == 0)
      {
        return new Integer(target);
      }

      //  Find the two values that bracket target and return the closer
      Integer first = firstElement();
      if (target <= first.intValue())
      {
        return first;
      }
      Integer last  = lastElement();
      if ((target >= last.intValue()) || (first.equals(last)))
      {
        return last;
      }
      Enumeration<Integer> enumerator = this.elements();
      Integer below = first;
      Integer above = first;
      while (enumerator.hasMoreElements())
      {
        above = enumerator.nextElement();
        if (above.intValue() > target)
        {
          break;
        }
        below = above;
      }
      return ((target - below.intValue()) < (above.intValue() - target) ?
                                                            below : above);
    }
  }

