$(function() {
	function bin2str(exponent)
	{
		//	Calculate 2^exp, and express result using K|M|G|T suffix
		var suffixes = ['', 'K', 'M', 'G', 'T'];
		var suffix_index = 0;
		var t = Math.pow(2, exponent);
		while ( t > 1023 )
		{
			t = t / 1024;
			suffix_index++;
		}
		return parseInt(t) + suffixes[suffix_index];
	}
	$('#address-bits-slider').slider({min:1, max:40, value:32});
  $('#address-bits-slider a').text('32');
	$('#address-bits-slider').bind( 'slidechange slide', function(evt, info) {
		$('#address-bits-slider a').text(info.value);
		$('#memory-locations-slider').slider('value', info.value);
	});
	$('#memory-locations-slider').slider({min:1, max:40, value:32});
  $('#memory-locations-slider a').text('4G');
	$('#memory-locations-slider').bind( 'slidechange slide', function(evt, info) {
		$('#memory-locations-slider a').text(bin2str(info.value));
		$('#address-bits-slider').slider('value', info.value);
	});
});