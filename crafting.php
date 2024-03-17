<?php

namespace TestPlugin;

use pocketmine\block\VanillaBlocks;
use pocketmine\crafting\ExactRecipeIngredient;
use pocketmine\crafting\FurnaceRecipe;
use pocketmine\crafting\FurnaceType;
use pocketmine\crafting\PotionTypeRecipe;
use pocketmine\crafting\ShapedRecipe;
use pocketmine\crafting\ShapelessRecipe;
use pocketmine\crafting\ShapelessRecipeType;
use pocketmine\item\VanillaItems;
use pocketmine\plugin\PluginBase;

class TestPlugin extends PluginBase
{
    protected function onEnable(): void
    {
        $crafting = $this->getServer()->getCraftingManager();

        $crafting->getFurnaceRecipeManager(FurnaceType::FURNACE)
            ->register(new FurnaceRecipe(VanillaItems::PAPER(), new ExactRecipeIngredient(VanillaItems::DIAMOND())));

        $crafting->getFurnaceRecipeManager(FurnaceType::BLAST_FURNACE)
            ->register(new FurnaceRecipe(VanillaBlocks::SLIME()->asItem(), new ExactRecipeIngredient(VanillaItems::COOKED_CHICKEN())));

        $crafting->getFurnaceRecipeManager(FurnaceType::SMOKER)
            ->register(new FurnaceRecipe(VanillaItems::BONE(), new ExactRecipeIngredient(VanillaItems::ECHO_SHARD())));

        $crafting->registerShapedRecipe(new ShapedRecipe(
            ["E", "E", "G"],
            ["E" => new ExactRecipeIngredient(VanillaItems::GOLD_INGOT()), "G" => new ExactRecipeIngredient(VanillaItems::EMERALD())],
            [VanillaItems::DIAMOND_SWORD()]));
        $crafting->registerShapelessRecipe(new ShapelessRecipe([new ExactRecipeIngredient(VanillaItems::DIAMOND())], [VanillaItems::EMERALD()], ShapelessRecipeType::CRAFTING));


        $crafting->registerPotionTypeRecipe(new PotionTypeRecipe(new ExactRecipeIngredient(VanillaItems::DIAMOND()), new ExactRecipeIngredient(VanillaItems::BONE()), VanillaItems::POTATO()));
    }
}
