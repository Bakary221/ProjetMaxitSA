<?php
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<!DOCTYPE html>
<html lang="fr">
<body>
    <div class="flex min-h-screen">
        <div class="bg-orange-500 flex-1 flex flex-col justify-center items-center text-white">
            <div class="text-center">
                <h1 class="text-7xl font-bold mb-4">
                    Max<span class="text-black">it</span>
                </h1>
                <div class="text-4xl font-bold mt-8 text-black">SN</div>
            </div>
        </div>

        <div class="flex-1 flex flex-col justify-center items-center px-8 py-8">
            <div class="w-full max-w-md">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Inscription</h2>

                <?php if (isset($errors['global'])): ?>
                    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded text-center">
                        <?= htmlspecialchars($errors['global']) ?>
                    </div>
                <?php endif; ?>

                <form class="space-y-4" method="POST" enctype="multipart/form-data" action="/signUp">

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label>Nom :</label>
                            <input name="nom" type="text" placeholder="Entrer votre nom" value="<?= $old['nom'] ?? '' ?>" class="input-style">
                            <?php if (isset($errors['nom'])): ?>
                                <p class="text-red-500 text-sm mt-1"><?= $errors['nom'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label>Prénom :</label>
                            <input name="prenom" type="text" placeholder="Entrer votre prénom" value="<?= $old['prenom'] ?? '' ?>" class="input-style">
                            <?php if (isset($errors['prenom'])): ?>
                                <p class="text-red-500 text-sm mt-1"><?= $errors['prenom'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label>Numéro de téléphone</label>
                        <input name="numeroTelephone" type="tel" placeholder="Entrer votre numéro de téléphone" value="<?= $old['numeroTelephone'] ?? '' ?>" class="input-style">
                        <?php if (isset($errors['numeroTelephone'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors['numeroTelephone'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label>Adresse :</label>
                        <input name="adresse" type="text" placeholder="Entrer votre adresse" value="<?= $old['adresse'] ?? '' ?>" class="input-style">
                        <?php if (isset($errors['adresse'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors['adresse'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label>Numéro Carte d'identité</label>
                        <input name="numeroIdentite" type="text" placeholder="Entrer votre numéro de carte nationale d'identité" value="<?= $old['numeroIdentite'] ?? '' ?>" class="input-style">
                        <?php if (isset($errors['numeroIdentite'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors['numeroIdentite'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label>Carte d'identité Recto</label>
                            <input name="photoRecto" type="file" accept="image/*" class="input-style">
                            <?php if (isset($errors['photoRecto'])): ?>
                                <p class="text-red-500 text-sm mt-1"><?= $errors['photoRecto'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label>Carte d'identité Verso</label>
                            <input name="photoVerso" type="file" accept="image/*" class="input-style">
                            <?php if (isset($errors['photoVerso'])): ?>
                                <p class="text-red-500 text-sm mt-1"><?= $errors['photoVerso'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label>Login</label>
                        <input name="login" type="text" placeholder="Entrer votre login" value="<?= $old['login'] ?? '' ?>" class="input-style">
                        <?php if (isset($errors['login'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors['login'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label>Mot de passe</label>
                        <input name="password" type="password" placeholder="Entrer votre mot de passe" class="input-style">
                        <?php if (isset($errors['password'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white py-3 px-4 rounded-lg font-medium hover:bg-orange-600 mt-6">
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
</body>
</html>

<style>
    .input-style {
        width: 100%;
        padding: 0.75rem;
        background-color: #edf2f7;
        border: 1px solid #cbd5e0;
        border-radius: 0.5rem;
        outline: none;
    }

    .input-style:focus {
        border-color: #f97316;
        box-shadow: 0 0 0 2px rgba(249, 115, 22, 0.5);
    }
</style>
