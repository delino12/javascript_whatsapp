<?php
/*
* Delino 
* Lizards network
*/


class DBconnect{
	protected $host;
	protected $user;
	protected $pass;
	protected $database;


	public function __construct()
	{
		$this->host = "localhost";
		$this->user = "root";
		$this->pass = "";
		$this->database = "test_auction";
	}

	public function iConnect()
	{
		$iConnect = mysqli_connect(
			$this->host,
			$this->user,
			$this->pass,
			$this->database
		);

		if(mysqli_connect_errno())
		{
			return "Error creating connection ! <br />".mysqli_connect_error();
		}

		return $iConnect;
	}
}

/**
*  Bids Class
*/
class Bid extends DBconnect
{
	protected $plug;
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->plug = DBconnect::iConnect();
	}

	public function checkBids($buyer_no, $tagged_no)
	{
		//defensive programming check if two numbers are the same
		if($buyer_no == $tagged_no){
			echo 'Error try refreshing the webpage';
		}else{
			// check buyers
			$check_buyer_no = " SELECT * FROM bids ";
			$check_buyer_no .= " WHERE(buyer = '".$buyer_no."' || tagged_no= '".$buyer_no."' "; // using OR for comparison
			$check_buyer_no .= " AND tagged ='".$tagged_no."' || buyer ='".$tagged_no."' ) "; // using OR for comparison
			$check_buyer_no_query = mysqli_query($this->plug, $check_buyer_no);
			if(!$check_buyer_no_query){
				// return error if query fail
				echo 'Error running the check buyer query <br />'.mysqli_error($this->plug);
			}elseif(mysqli_num_rows($check_buyer_no_query)){
				// fetch numbers 
				echo 'Duplicates Found <br />';

				// now fetch data to decide
				while($bids_details = mysqli_fetch_array($check_buyer_no_query)){
					$db_buyer_no = $bids_details['buyer'];
					$db_tagged_no = $bids_details['tagged'];

					// u can return if u like.
				}
			}
		}
	}
}

$auction = new Bid();
$auction_bids = $auction->checkBids($buyer_no, $tagged_no);
?>