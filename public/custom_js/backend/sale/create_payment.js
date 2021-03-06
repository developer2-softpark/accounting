

    $(document).on('keyup change','.cr_final_payable_amount , .cr_given_amount_for_take_and_change',function(){
            setsInputAndTextTypeValue();
    });


    function setsInputAndTextTypeValue()
    {
        setDueAmount();
        setChangeableAmount();
    }

    function setDueAmount()
    {
        $('.cr_final_due_amount').val(totalDueAmount());
    }

    function totalDueAmount()
    {
        return (finalPayableAmount() - payNowAmount()).toFixed(2);
    }

    function payNowAmount()
    {
        return nanCheck($('.cr_final_payable_amount').val());
    }

    function finalPayableAmount()
    {
        return nanCheck($('.cr_fianl_payable_amount_get').val());
    }



    function setChangeableAmount()
    {
        $('.cr_change_amount_after_calculation').val(totalChangeableAmount());
    }
    function totalChangeableAmount()
    {
       return (givenAmountForTakeAndChange() - payNowAmount()).toFixed(2);
    }
    function givenAmountForTakeAndChange()
    {
        return nanCheck($('.cr_given_amount_for_take_and_change').val());
    }


    /*
    |-----------------------------------------------------------------
    | Nan Check
    |-------------------------------------------------------------
    */
        function nanCheck(val)
        {
            var nanResult = 0;
            if(isNaN(val)) {
                nanResult = 0;
            }
            else{
                nanResult = val;
            }
            return nanResult;
        }
    /*
    |-----------------------------------------------------------------
    | Nan Check
    |-------------------------------------------------------------
    */
