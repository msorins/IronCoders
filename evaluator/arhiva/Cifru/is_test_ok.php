<?php
function is_test_ok($in, $ok, $output)
	{
        $ok=(int)$ok;
        $output=(int)$output;
        if(abs($ok-$output)<=1)
            return 1;
        else
            return 0;
	}
?>