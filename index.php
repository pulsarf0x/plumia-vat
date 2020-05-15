<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convertisseur HT TTC TVA - Plumia VAT</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">
    <div class="container mx-auto flex justify-center">
        <div class="m-6">
            <form class="max-w-xs p-6 w-full bg-white rounded shadow-md mb-4">
                <div class="mb-4">
                    <label class="block">Prix HT</label>
                    <input type="number" id="ht" class="block w-full p-2 rounded shadow-md" min="0.00" step="0.01">
                </div>
                <div class="mb-4">
                    <label class="block">Taux de TVA (%)</label>
                    <input type="text" id="taux" class="block w-full p-2 rounded shadow-md" value="20">
                </div>
                <div class="mb-4">
                    <label class="block">Montant TVA</label>
                    <input type="number" id="tva" class="block w-full p-2 rounded shadow-md" min="0.00" step="0.01">
                </div>
                <div class="mb-1">
                    <label class="block">Prix TTC</label>
                    <input type="number" id="ttc" class="block w-full p-2 rounded shadow-md" min="0.00" step="0.01">
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2020 Plumia. All rights reserved.
            </p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('#ht').on('input', function() {
            let $input = $(this);

            let ht = $('#ht').val();
            let taux =  $('#taux').val();

            let ttc = HTtoTTC(ht, taux);
            let tva = ttc - ht;

            $('#tva').val(tva.toFixed(2));
            $('#ttc').val(ttc.toFixed(2));
        });

        $('#ttc').on('input', function() {
            let $input = $(this);

            let ttc = $('#ttc').val();
            let taux =  $('#taux').val();

            let ht = TTCtoHT(ttc, taux);
            let tva = ttc - ht;

            $('#tva').val(tva.toFixed(2));
            $('#ht').val(ht.toFixed(2));

        });

        $('#taux').on('input', function() {
            let $input = $(this);

            let ht = $('#ht').val();
            let taux =  $('#taux').val();

            let ttc = HTtoTTC(ht, taux);
            let tva = ttc - ht;

            $('#tva').val(tva.toFixed(2));
            $('#ttc').val(ttc.toFixed(2));
        });

        function HTtoTTC(ht, tva) {
            return ht * (1 + (tva / 100));
        }

        function TTCtoHT(ttc, tva) {
            return ttc / (1 + tva / 100);
        }
    </script>
</body>
</html>