<!DOCTYPE html>
<html lang="fr">
    <div class="flex min-h-screen">
        <div class="bg-orange-500 flex-1 flex flex-col justify-center items-center text-white">
            <div class="text-center">
                <h1 class="text-7xl font-bold mb-4">
                    Max<span class="text-black">it</span>
                </h1>
                <div class="text-4xl font-bold mt-8 text-black">
                    SN
                </div>
            </div>
        </div>

        <div class="flex-1 flex flex-col justify-center items-center px-8">
            <div class="w-full max-w-md">
                <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center">
                    Bienvenu Chez MaxitSA
                </h2>

                <form action="/login" method="post" class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-4">
                        Connexion
                    </h3>

                    <div class="relative mb-4">
                        <input 
                            type="tel" 
                            name="telephone"
                            placeholder="Entrer votre numéro de téléphone"
                            class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                        >
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="relative mb-4">
                        <input 
                            type="password" 
                            name="password"
                            placeholder="Entrer votre mot de passe"
                            class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                        >
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.105.895-2 2-2s2 .895 2 2m-4 0a2 2 0 11-4 0 2 2 0 014 0zm-6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Zone d'affichage des erreurs (si besoin) -->
                    <div class="text-sm text-red-600 mt-1 ml-1">
                        <!-- Affichage erreur ici -->
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white py-3 px-4 rounded-lg font-medium hover:bg-orange-600 transition-colors duration-200 mt-4">
                        Connexion
                    </button>
                </form>

                <div class="text-center text-sm text-gray-600">
                    <span>Nouveau chez MaxitSA ?</span>
                    <a href="/inscription" class="text-blue-600 hover:text-blue-800 ml-2">Inscription</a>
                </div>
            </div>
        </div>
    </div>
</html>
