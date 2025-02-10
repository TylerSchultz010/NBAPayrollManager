<html lang="en">
    <head>
        <title>Salary Calculator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="d-flex justify-content-center align-items-center" style="background-color:#212529"> <!-- #212529 -->
        <div class="d-flex mt-3 ms-3">
            <form action = "submit-salary.php" style = "width:400px;" class = "container-fluid p-4 bg-dark text-white">
                <?php include 'salary-maker.php';?>
            </form>
            <form action = "submit-tax.php" style = "width:400px;" class = "container-fluid p-4 bg-dark text-white">
                <?php include 'tax-calculator.php';?>
            </form>
        </div>
    </body>

