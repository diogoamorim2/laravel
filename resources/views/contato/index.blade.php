@extends('layout.default')

@section('head')
@endsection

<body>
    <main class="contained">
        <h1>Contatos (Admin)</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Assunto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->assunto }}</td>
                    <td>
                        <!-- Add actions here -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contatos->links() }}
    </main>
</body>
