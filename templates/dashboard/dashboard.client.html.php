<!DOCTYPE html>
<html lang="fr">
<main class="flex-1 p-6 bg-gray-50">
    <div class="bg-black text-white rounded-lg p-6 mb-6 relative overflow-hidden">
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-3xl font-bold mb-2">Maxit</h2>
                <p class="text-gray-300 mb-1 text-sm">Compte principal</p>
                <p class="text-lg font-semibold">77 773 27 62</p>
            </div>
            <div class="bg-white p-3 rounded-lg">
                <img src="images/qrcode.png" alt="le code qrcode" class="w-[100px]">
            </div>
        </div>
        <div class="absolute bottom-6 right-32 mr-12 flex items-center">
            <span class="text-gray-300 mr-3">Solde :</span>
            <div class="flex space-x-1 mr-3">
                <div class="w-2 h-2 bg-white rounded-full"></div>
                <div class="w-2 h-2 bg-white rounded-full"></div>
                <div class="w-2 h-2 bg-white rounded-full"></div>
                <div class="w-2 h-2 bg-white rounded-full"></div>
                <div class="w-2 h-2 bg-white rounded-full"></div>
                <div class="w-2 h-2 bg-white rounded-full"></div>
            </div>
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
            Créer un compte secondaire
        </button>
        <button class="bg-gray-500 text-white rounded-lg px-4 py-3 text-sm font-medium hover:bg-gray-600 flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Changer compte secondaire
        </button>
    </div>

    <div class="mb-4">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">Historiques</h3>
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
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-2">
                        <span class="inline-block w-2 h-2 bg-green-500 rounded-full"></span> Paiement
                    </td>
                    <td class="px-6 py-4 text-orange-500">12 janvier 2025</td>
                    <td class="px-6 py-4 text-gray-800 font-semibold">-25 000 FCFA</td>
                    <td class="px-6 py-4 text-green-600 font-medium">Réussi</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-2">
                        <span class="inline-block w-2 h-2 bg-green-500 rounded-full"></span> Dépôt
                    </td>
                    <td class="px-6 py-4 text-orange-500">23 juin 2025</td>
                    <td class="px-6 py-4 text-gray-800 font-semibold">245 488 FCFA</td>
                    <td class="px-6 py-4 text-green-600 font-medium">Réussi</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-2">
                        <span class="inline-block w-2 h-2 bg-red-500 rounded-full"></span> Retrait
                    </td>
                    <td class="px-6 py-4 text-orange-500">23 juillet 2025</td>
                    <td class="px-6 py-4 text-gray-800 font-semibold">245 488 FCFA</td>
                    <td class="px-6 py-4 text-red-600 font-medium">Échec</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex justify-center mt-6">
        <div class="flex items-center space-x-2">
            <button class="px-3 py-1 text-gray-500 hover:text-gray-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button class="px-3 py-1 bg-orange-500 text-white rounded-full min-w-8 h-8 flex items-center justify-center">1</button>
            <button class="px-3 py-1 text-gray-500 hover:text-gray-700 min-w-8 h-8 flex items-center justify-center">2</button>
            <button class="px-3 py-1 text-gray-500 hover:text-gray-700 min-w-8 h-8 flex items-center justify-center">3</button>
            <button class="px-3 py-1 text-gray-500 hover:text-gray-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>
</main>
</html>
