<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter compte secondaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <h1 class="text-xl font-semibold text-gray-800 mb-8 text-center">Ajouter compte secondaire</h1>
        
        <form class="space-y-6" action="#">
            <div>
                <label for="numero" class="block text-sm font-medium text-gray-700 mb-2">Numero *</label>
                <div class="relative">
                    <input 
                        type="text" 
                        id="numero" 
                        name="numero"
                        placeholder="Entrer votre second numero"
                        class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none text-gray-700"
                    >
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div>
                <label for="solde" class="block text-sm font-medium text-gray-700 mb-2">Solde</label>
                <input 
                    type="text" 
                    id="solde" 
                    name="solde"
                    placeholder="Entrer votre Solde"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none text-gray-700"
                >
            </div>
            
            <button 
                type="submit" 
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 px-4 rounded-md transition-colors duration-200 mt-8"
            >
                Ajouter
            </button>
        </form>
    </div>
</body>
</html>