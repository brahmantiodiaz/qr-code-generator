<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Qr-Code ETG</title>
</head>

<body>
    <div class="container">
        <h2>Qr Code ETG</h2>
        <div class="row">
            <div class="col">
                <form action="javascript:void(0)" enctype="multipart/form-data" id="qr-form">
                    @csrf
                    <div class="form-group">
                        <label>Your Url</label>
                        <input type="text" name="url" class="form-control" placeholder="url" required
                            id="url">
                        <label>Foreground Color</label>
                        <input type="color" id="ForegroundColor" name="ForegroundColor" value="#000000">
                        <label>Background Color</label>
                        <input type="color" id="BackgroundColor" name="BackgroundColor" value="#FFFFFF"><br>
                        <label>Label</label>
                        <input type="text" name="label" class="form-control" placeholder="label">
                        <label>Label Text Color</label>
                        <input type="color" id="labelColor" name="labelColor" value="#000000">
                        <label>Logo</label>
                        <input type="file" name="image" class="form-control-file"
                            accept="image/gif, image/jpeg, image/png">
                        <label>Logo Width</label>
                        <input type="number" inputmode="numeric" name="logoWidth" class="form-control number"
                            placeholder="Logo Width" min="50">
                        <label>Logo Height</label>
                        <input type="number" name="logoHeight" class="form-control number" placeholder="Logo Height"
                            min="50">
                    </div>
                    <button class="btn btn-success" id="buat-qr">Buat QR</button>
                    <a style="display:none" class="btn btn-primary" id="download-btn" download>Download</a>
                </form>
            </div>
            <div class="col">
                <div id="image" class="text-center">

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
