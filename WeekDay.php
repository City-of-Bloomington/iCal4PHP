<?php
/**
 * @copyright 2007-2015 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Cliff Ingham <inghamn@bloomington.in.gov>
 */
namespace iCal4PHP;

class WeekDay
{
	private $day;
	private $offset = 0;

	public static $names = [
        'SU'=>'Sunday',
        'MO'=>'Monday',
        'TU'=>'Tuesday',
        'WE'=>'Wednesday',
        'TH'=>'Thursday',
        'FR'=>'Friday',
        'SA'=>'Saturday'
    ];

    public static $offsets = [
        1  => 'First',
        2  => 'Second',
        3  => 'Third',
        4  => 'Fourth',
        -2 => 'Second To Last',
        -1 => 'Last'
    ];

	public function __construct($string, $offset=null)
	{
		if ($offset) {
			$this->day = $string;
			$this->offset = (int) $offset;
		}
		else {
			// Parse the string for an offset
			if (strlen($string) > 2) {
				$this->day = substr($string,-2);
				$this->offset = (int) substr($string,0,-2);
			}
			else {
				$this->day = $string;
			}
		}
	}

	public function __toString()
	{
		if ($this->offset) {
			return $this->offset.$this->day;
		}
		else {
			return $this->day;
		}
	}

	public function getDayName()
	{
		return self::$names[$this->day];
	}

	public function getDay()
	{
		return $this->day;
	}

	public function getOffset()
	{
		return $this->offset;
	}
}