<?php
class Operation_Investment_Record_Withdrawal extends Operation_Investment_Record
{
	public function Validate()
	{
		$this->ValidateFromDate();
		$this->ValidateToAccountAllowingUnknownAccount();
		$this->ValidateToDate();
		$this->ValidatePaymentDisinvested();
		$this->ValidateDesignation();
	}

	public function Save()
	{
		$recordTypeIncome = 10;

		$uuid = $this->_db->GenerateUUID();

		$this->_db->InsertInvestmentRecord_Income(
				$this->_fromAccount,
				$uuid,
				$this->_fromDate,
				$this->_designation,
				-1 * $this->_amountDisinvested,
				-1 * $this->_amountDisinvested);

		if ($this->_toAccount != '')
		{
			$this->_db->InsertRecord_AmountTransfer(
					$this->_toAccount,
					$this->_currentUserId,
					$this->_toDate,
					$this->_amountDisinvested,
					$this->_designation,
					$recordTypeIncome,
					$uuid);
		}
	}
}