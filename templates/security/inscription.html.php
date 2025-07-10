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

        <div class="flex-1 flex flex-col justify-center items-center px-8 py-8">
            <div class="w-full max-w-md">
                <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center">
                    Inscription
                </h2>
                
                <form class="space-y-4" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Nom :
                            </label>
                            <input 
                                type="text" 
                                placeholder="Entrer votre nom"
                                class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Prénom :
                            </label>
                            <input 
                                type="text" 
                                placeholder="Entrer votre prénom"
                                class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Numéro de téléphone
                        </label>
                        <input 
                            type="tel" 
                            placeholder="Entrer votre numéro de téléphone"
                            class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Adresse :
                        </label>
                        <input 
                            type="text" 
                            placeholder="Entrer votre adresse"
                            class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Numéro Carte d'identité
                        </label>
                        <input 
                            type="text" 
                            placeholder="Entrer votre numéro de carte national d'identité"
                            class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                        >
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Carte d'identité Recto
                            </label>
                            <input 
                                type="file"
                                accept="image/*"
                                class="w-full px-4 py-3 border-gray-300 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Carte d'identité Verso
                            </label>
                            <input 
                                type="file"
                                accept="image/*"
                                class="w-full px-4 py-3 border-gray-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Photo
                        </label>
                        <input 
                            type="file"
                            accept="image/*"
                            class="w-full px-4 py-3 border-gray-300 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                        >
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white py-3 px-4 rounded-lg font-medium hover:bg-orange-600 transition-colors duration-200 mt-6">
                        Inscription
                    </button>
                </form>
                
                <div class="text-center text-sm text-gray-600 mt-4">
                    <span>Déjà un compte ?</span>
                    <a href="/" class="text-blue-600 hover:text-blue-800 ml-2">Connexion</a>
                </div>
            </div>
        </div>
    </div>
</html>