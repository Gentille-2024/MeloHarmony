
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="styles.css">

    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body, h1, h2, h3, p, ul, li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #101010;
            color: #ffffff;
        }

        #payment-form {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: orange;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #ffffff;
        }

        #stripe-form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 15px;
            color: #ffffff;
            font-size: 16px;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #101010;
            border-radius: 4px;
            background-color: #ffffff;
            color: #101010;
            font-size: 16px;
        }

        


        #payed {
            background-color: green;
            color: #ffffff;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            font-size: 18px;
        }
        h4{
            color: yellowgreen;
            
            width: 500px;
            height: 40px;
            
        }
    </style>
</head>

<body>

    <div id="payment-form">
       
        <form id="stripe-form" method="POST">
            <select name="pay" id="payment-method">
                <option value="" disabled selected>
                    Select Payment Method
                </option>
                <option value="credit_card">Credit card or Debit card</option>
                <option value="airtel">Airtel Money</option>
                <option value="mtn">MTN mobile money</option>
            </select>

            <div id="payment-details" style="display: none;">
                <label for="paymentNumber">Payment Number:</label>
                <input type="text" id="paymentNumber" name="paymentNumber" placeholder="Enter Payment Number">
            </div>
        <h4></h4>
            <button type="submit" id="payed" name="payup">PAY NOW</button>
        </form>

        <script>
            document.getElementById('payment-method').addEventListener('change', function () {
                var selectedOption = this.value;

                // Show input field only if a payment option is selected
                document.getElementById('payment-details').style.display = selectedOption ? 'block' : 'none';
            });
        </script>
    </div>

</body>

</html>