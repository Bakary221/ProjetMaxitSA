<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>

    <!DOCTYPE html>
    <html lang="fr">
        <div class="flex min-h-screen">
            <div class="bg-orange-500 flex-1 flex flex-col justify-center items-center text-white">
                <div class="text-center">
                    <h1 class="text-7xl font-bold mb-4">Max<span class="text-black">it</span></h1>
                    <div class="text-4xl font-bold mt-8 text-black">SN</div>
                </div>
            </div>

            <div class="flex-1 flex flex-col justify-center items-center px-8">
                <div class="w-full max-w-md">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center">Bienvenue Chez MaxitSA</h2>

                    <form action="/login" method="post" class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-4">Connexion</h3>

                        <div class="relative mb-2">
                            <input 
                                type="text" 
                                name="login"
                                placeholder="Entrer votre login"
                                class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                            >
                            <?php if (isset($errors['login'])): ?>
                                <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['login']) ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="relative mb-2">
                            <input 
                                type="password" 
                                name="password"
                                placeholder="Entrer votre mot de passe"
                                class="w-full px-4 py-3 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent placeholder-gray-500"
                            >
                            <?php if (isset($errors['password'])): ?>
                                <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['password']) ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Erreur globale -->
                        <?php if (isset($errors['global'])): ?>
                            <p class="text-red-600 text-sm mt-2"><?= htmlspecialchars($errors['global']) ?></p>
                        <?php endif; ?>

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
