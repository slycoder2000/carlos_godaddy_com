<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css" />
    <title>Phonetic Alphabet</title>

    <script src="/scripts/vue.js"></script>

    <script>
    function isEmpty(obj) {
        for (var key in obj) {
            if (obj.hasOwnProperty(key)) return false;
        }
        return true;
    }

    new Vue({
        el: '#wrapper',
        data() {
            return {
                spreadsheet: '',
                lineitems: [],
                totalAmount: 0,
                calcItems: [],
                xferFrom: -1,
                xferTo: -1,
                mxfer: false
            };
        },
        created() {},
        methods: {},
        computed: {}
    });
    </script>

</head>

<body>
    <div id="wrapper">
        {{spreadsheet}}
    </div>
</body>

</html>