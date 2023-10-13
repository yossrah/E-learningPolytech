<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Etudiants</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }

        th {
            background-color: rgba(33, 31, 31, 0.927);
            color: white;
        }

        table,
        th,
        td {
            border: 1.8px solid #ddd;
            padding: 8px;
            margin: 5px;
        }

        .signature {
            display: inline;
            width: 30%
        }
    </style>
</head>

<body>
    <div>
        <h1 style="text-align: center">{{ $filiere[0] }} {{ $niveau[0] }}</h1>
    </div>
    @foreach ($class as $classe)
        @foreach ($classe->Groupes as $groupe)
            <h3 style="text-align: center">{{ $classe->libelle }} {{ $groupe->libelle }}</h3>
            <table class="center">
                <thead>
                    <tr>
                        <th>matricule</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>class</th>
                        <th>groupe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groupe->Etudiants as $etudiant)
                        <tr>
                            <td>{{ $etudiant->matricule }}</td>
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->prenom }}</td>
                            <td>{{ $etudiant->Class->libelle }}</td>
                            <td>{{ $etudiant->Groupe->libelle }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endforeach

</body>

</html>
