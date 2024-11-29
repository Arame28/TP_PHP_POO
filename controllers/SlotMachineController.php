<?php

namespace Controllers;

class SlotMachineController
{
    // Méthode publique pour gérer le routage
    public function index()
    {
        require_once '/../views/SlotMachineView.php';
    }

    // Méthode pour gérer la logique du tirage
    public function play()
    {
        // Symboles et leurs poids (probabilité d'apparition)
        $symbols_with_weights = [
            '🍋' => 40,
            '🍒' => 30,
            '⭐' => 15,
            '🔔' => 10,
            '💎' => 5,
        ];

        // Table des gains
        $paytable = [
            '🍋🍋🍋' => 40,
            '🍒🍒🍒' => 50,
            '⭐⭐⭐' => 100,
            '🔔🔔🔔' => 150,
            '💎💎💎' => 200,
        ];

        // Générer 3 symboles
        $reel1 = $this->getRandomSymbol($symbols_with_weights);
        $reel2 = $this->getRandomSymbol($symbols_with_weights);
        $reel3 = $this->getRandomSymbol($symbols_with_weights);

        // Résultat de la machine à sous
        $combination = $reel1 . $reel2 . $reel3;

        // Calculer le gain
        $gain = isset($paytable[$combination]) ? $paytable[$combination] : 0;

        // Réponse JSON
        echo json_encode([
            'success' => true,
            'reels' => [$reel1, $reel2, $reel3],
            'gain' => $gain,
        ]);
    }

    // Méthode privée pour générer un symbole aléatoire basé sur les poids
    private function getRandomSymbol($symbols_with_weights)
    {
        $rand = mt_rand(1, array_sum($symbols_with_weights));

        foreach ($symbols_with_weights as $symbol => $weight) {
            if ($rand <= $weight) {
                return $symbol;
            }
            $rand -= $weight;
        }

        return null;
    }
}