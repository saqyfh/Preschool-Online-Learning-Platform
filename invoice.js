
    function printInvoice(){
        window.print();
    }

    function invoiceID() {
        let invID=1002;
        if (invID) {
            return (
                `<div class='invoiceNo'>
                <h2 style ='font-size= 10px;'>INV ${invID++} </h2>
                </div>`);
        };
    }

    function stepOnUp() {
        let orderId=102;
        if (invID) {
            return orderId++;
        }
    }