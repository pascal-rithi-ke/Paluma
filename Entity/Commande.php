<?php
namespace Entity;

class Commande {
    /**
     * @var int
     */
    private int $id;

        /**
     * @var int
     */
    private int $id_produit;

        /**
     * @var int
     */
    private int $id_visiteur;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

        /**
     * @return int
     */
    public function getIdProduit(): int
    {
        return $this->Id_produit;
    }

        /**
     * @return int
     */
    public function getIdVisiteur(): int
    {
        return $this->id_visiteur;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

        /**
     * @param int $id
     */
    public function setIdProduit(int $id_produit): void
    {
        $this->id_produit = $id_produit;
    }


        /**
     * @param int $id
     */
    public function setIdVisiteur(int $id_visiteur): void
    {
        $this->id_visiteur = $id_visiteur;
    }


}