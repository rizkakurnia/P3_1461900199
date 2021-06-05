<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Siswa</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    </head>

    <body>
        <div class="container">
            <div class="col-md-12">
                <div style="height: 15px;"></div> 
                <form action="/siswa/cari">                    
                    <label for="pelajaran">Pelajaran:</label>
                    <select name="pelajaran" id="cars">
                        @foreach($data as $key => $value)
                        <option value="{{ $value->mengajar }}">{{ $value->mengajar }}</option>                        
                        @endforeach
                    </select>                
                    <input type="submit" value="Filter">
                </form>               
                <br>
                <div>
                    <a class="button" href="/siswa/tambah">Tambah</a>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Guru</th>
                                <th>Pelajaran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->alamat }}</td>
                                <td>{{ $value->guru }}</td>
                                <td>{{ $value->mengajar }}</td>
                                <td>
                                    <a href="/siswa/edit/{{ $value->id }}">Edit</a>
                                    |
                                    <a href="/siswa/hapus/{{ $value->id }}">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </body>

</html>