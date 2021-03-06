<?php
    /**
     * Created by PhpStorm.
     * User: angem
     * Date: 21-Sep-18
     * Time: 10:52 PM
     */

    if (isset($_POST['nbr']) && empty($_POST['nbr']) === false && isset($_POST['nature']) && ($_POST['nature']) === "0" || $_POST['nature'] === "1") {
        $nbr = stripcslashes($_POST['nbr']);
        $nature = stripcslashes($_POST['nature']);
        $libelle_nature = $nature == "0" ? "Dépense" : "Recette";

        echo '<span id="nbr_" hidden>' . $nbr . '</span>
<table class="table table-sm table-hover my-4 ncare bg-light font-weight-light" id="etat">
    <thead class="bg-primary text-light">
    <tr>
        <th class="w-8" rowspan="2">Compte</th>
        <th class="" rowspan="2">Libellé</th>
        <th class="w-8" rowspan="2">Date</th>
        <th class="w-25" rowspan="2">Opération</th>
        <th colspan="3" class="w-25">' . $libelle_nature . '</th>
        <th class="" rowspan="2">Statut</th>
        <th class="" rowspan="2">Observation</th>
    </tr>
    <tr class="bg-success">
        <th class="">En Devise</th>
        <th class="">Cours</th>
        <th class="">En XOF</th>
    </tr>
    </thead>
    <tbody>';
        for ($i = 1; $i <= $nbr; $i++) {
            echo '<tr>';
            echo '<td>
    <input type="text" class="form-control form-control-sm text-uppercase" id="compte' . $i . '">
</td>
<td>
    <input type="text" class="form-control form-control-sm text-uppercase" id="libelle' . $i . '">
</td>
<td>
    <input type="date" class="form-control form-control-sm" id="date' . $i . '">
</td>
<td>
    <input type="text" class="form-control form-control-sm text-uppercase" id="operation' . $i . '">
</td>
<td class="">
    <input type="text" class="operand' . $i . ' form-control form-control-sm text-uppercase text-right"
           id="mtt_devise-' . $i . '" placeholder="0" onchange="calculXof(this)">
</td>
<td class="">
    <input type="text" class="operand' . $i . ' form-control form-control-sm text-uppercase text-right"
           id="cours-' . $i . '" placeholder="0" onchange="calculXof(this)">
</td>
<td class="">
    <input type="text" class="form-control form-control-sm text-uppercase text-right" id="mtt_xof-' . $i . '"
           placeholder="0" readonly>
</td>
<td>
    <select class="custom-select custom-select-sm" id="statut' . $i . '">
        <option value="1" title="Validée">Val.</option>
        <option value="2" title="En Attente">Att.</option>
        <option value="3" title="Annulée">Ann.</option>
    </select>
</td>
<td>
    <input type="text" class="form-control form-control-sm text-uppercase" id="observation' . $i . '">
</td>';
            echo '</tr>';
        }
        echo '
        </tbody>
    </table>
        ';
    }