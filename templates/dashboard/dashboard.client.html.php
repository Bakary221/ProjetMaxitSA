<!DOCTYPE html>
<html lang="fr">
<main class="flex-1 p-6 bg-gray-50">

<?php
$data = $_SESSION['data'] ?? null;

if ($data):
    $utilisateur = $data['utilisateur'];
    $comptes = $data['comptes'];
    $comptePrincipal = $comptes[0] ?? null;
?>

    <div class="bg-black text-white rounded-lg p-6 mb-6 relative overflow-hidden">
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-3xl font-bold mb-2"><?= htmlspecialchars($utilisateur['prenom'] . ' ' . $utilisateur['nom']) ?></h2>
                <p class="text-gray-300 mb-1 text-sm">Compte <?= $comptePrincipal['type'] ?? 'principal' ?></p>
                <p class="text-lg font-semibold"><?= htmlspecialchars($utilisateur['numeroTelephone']) ?></p>
            </div>
            <div class="bg-white p-3 rounded-lg">
                <img src="images/qrcode.png" alt="le code qrcode" class="w-[100px]">
            </div>
        </div>

        <div class="absolute bottom-6 right-32 mr-12 flex items-center">
            <span class="text-gray-300 mr-3">Solde :</span>
            <p class="text-white font-semibold mr-3"><?= number_format($comptePrincipal['solde'], 0, ',', ' ') ?> FCFA</p>
            <i class="fa-solid fa-eye-slash text-orange-500"></i>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4 mb-6">
        <button class="bg-white border border-gray-300 rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
            </svg>
            Consulter mes transactions
        </button>
        <button class="bg-white border border-gray-300 rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <a href="/compteSecondaire">Creer un compte secondaire</a>
        </button>
        <button class="bg-gray-500 text-white rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-600 flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Changer compte secondaire
        </button>
    </div>

    <div class="mb-4">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">Liste des 10 transactions</h3>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg border-2 border-green-300">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Montant</th>
                    <th class="px-6 py-3">Statut</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php
                    $transactions = $comptePrincipal['transactions'] ?? [];
                    $transactions = array_slice($transactions, 0, 10);

                    foreach ($transactions as $transaction):
                        $type = ucfirst($transaction['type']);
                        $montant = number_format($transaction['montant'], 0, ',', ' ');
                        $date = date('d F Y', strtotime($transaction['date']));
                        $statut = 'Réussi'; // à adapter selon ta logique
                        $statutColor = 'text-green-600';
                        $dotColor = $type === 'Retrait' ? 'bg-red-500' : 'bg-green-500';
                        if (strtolower($type) === 'retrait') {
                            $statut = 'Échec'; // Exemple condition
                            $statutColor = 'text-red-600';
                        }
                ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-2">
                        <span class="inline-block w-2 h-2 <?= $dotColor ?> rounded-full"></span> <?= $type ?>
                    </td>
                    <td class="px-6 py-4 text-orange-500"><?= $date ?></td>
                    <td class="px-6 py-4 text-gray-800 font-semibold">
                        <?= (strtolower($type) === 'retrait' || strtolower($type) === 'paiement') ? '-' : '' ?>
                        <?= $montant ?> FCFA
                    </td>
                    <td class="px-6 py-4 <?= $statutColor ?> font-medium"><?= $statut ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="flex justify-center mt-6">
        <a href="#" class="text-orange-500 text-xl">Voir plus</a>
    </div>

<?php else: ?>
    <p class="text-red-500 text-lg">Aucune donnée disponible.</p>
<?php endif; ?>
</main>
</html>
