<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="steps">
                    <progress id="progress" value=0 max=100></progress>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapse">
                                DD
                            </button>
                        </div>
                        <div class="step-title">
                            Department Head
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                DHA
                            </button>
                        </div>
                        <div class="step-title">
                            Department Head Approval
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                FHA
                            </button>
                        </div>
                        <div class="step-title">
                            Finance Head Approval
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                HLA
                            </button>
                        </div>
                        <div class="step-title">
                            High Level Approval
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                FR
                            </button>
                        </div>
                        <div class="step-title">
                            Fund Release
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                L
                            </button>
                        </div>
                        <div class="step-title">
                            Liquidation
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                R
                            </button>
                        </div>
                        <div class="step-title">
                            Refund
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                RA
                            </button>
                        </div>
                        <div class="step-title">
                            Requestor Acknowledgement
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                DHA
                            </button>
                        </div>
                        <div class="step-title">
                            Department Head Acknowledgement
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                FHA
                            </button>
                        </div>
                        <div class="step-title">
                            Finance Head Acknowledgement
                        </div>

                    </div>
                    <div class="step-collumn">
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                S
                            </button>
                        </div>
                        <div class="step-title">
                            Summary
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mt-5 ">
                    <div class="card-header bg-dark ">
                        <ul class="nav nav-tabs  ">
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page" href="">1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="">3</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="card-body bg-mute">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-control"></div>
    <textarea name="" id="" cols="30" rows="10"></textarea>

</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</html>