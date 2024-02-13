<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Espace Membre') }}
        </h2>
    </x-slot>

 <!-- Section de notification pour afficher les messages temporaires -->
 <div id="notification" class="fixed top-0 left-0 w-full bg-gray-200 dark:bg-white-700 px-4 py-2 text-center z-50"></div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-6">
                <!-- Colonne des messages -->
                <div class="col-span-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <!-- Liste des postes -->
                            @isset($posts)
                                @foreach($posts as $post)
                                    <div class="post mb-4">
                                        <p>{{ $post->content }}</p>
                                        <!-- Affichage du nombre de likes -->
                                        <p>{{ $post->likes()->count() }} Likes</p>
                                        <!-- Bouton affichage like / liké -->
                                        <form action="{{ route('posts.like', $post->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="like-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                @if ($post->likes->contains('user_id', auth()->user()->id))
                                                    Post Liké
                                                @else
                                                    Like
                                                @endif
                                            </button>
                                        </form>
                                        <!-- Bouton de suppression -->
                                        @if(auth()->user()->id === $post->user_id)
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                            </form>
                                        @endif
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
                <!-- Colonne du formulaire de création de poste -->
                <div class="col-span-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <!-- Formulaire de création de poste -->
                            <form action="{{ url('/posts') }}" method="post">
                                @csrf
                                <textarea name="content" placeholder="Write something..." class="text-black"></textarea>
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Poster</button>
                            </form>
                        </div>
                        <!-- Ajouter un lien vers la page répertoriant les comptes -->
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Voir tous les comptes / gerer les comptes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Script JavaScript pour afficher les messages temporaires -->
      <script>
        // Attendre que le DOM soit chargé
        document.addEventListener('DOMContentLoaded', function () {
            // Vérifier si un message de succès est présent dans la session
            var successMessage = "{{ session('success') }}";
            if (successMessage) {
                // Afficher le message de succès dans la section de notification
                document.getElementById('notification').innerHTML = '<div class="alert alert-success">' + successMessage + '</div>';

                // Effacer le message après quelques secondes
                setTimeout(function () {
                    document.getElementById('notification').innerHTML = '';
                }, 3000); // 3000ms = 3 secondes
            }

            // Vérifier si un message d'erreur est présent dans la session
            var errorMessage = "{{ session('error') }}";
            if (errorMessage) {
                // Afficher le message d'erreur dans la section de notification
                document.getElementById('notification').innerHTML = '<div class="alert alert-danger">' + errorMessage + '</div>';

                // Effacer le message après quelques secondes
                setTimeout(function () {
                    document.getElementById('notification').innerHTML = '';
                }, 3000); // 3000ms = 3 secondes
            }
        });
    </script>
</x-app-layout>


