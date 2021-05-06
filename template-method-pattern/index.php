<?php

use TemplateMethodPattern\TurkeySub;
use TemplateMethodPattern\VeggieSub;

require '../vendor/autoload.php';

(new TurkeySub())->make();
(new VeggieSub())->make();
