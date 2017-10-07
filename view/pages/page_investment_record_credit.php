<h1><?= t('Saisir un versement sur un placement') ?></h1>

<form id="form" action="/">
<table class="actionsTable">
<tr>

<td>
<?= t('Depuis le compte') ?><br>
<input type="radio" name="fromAccount" value=""><i>Compte inconnu</i><br>
<?php
$accounts = $accountsHandler->GetAllPrivateAccounts();
foreach ($accounts as $account)
{ ?>
<input type="radio" name="fromAccount" <?= $account->get('accountId') == $_SESSION['account_id'] ? 'checked' : '' ?> value="<?= $account->get('accountId') ?>"><?= $account->get('name') ?><br>
<?php } ?>
<?php
$accounts = $accountsHandler->GetAllDuoAccounts();
foreach ($accounts as $account)
{ ?>
<input type="radio" name="fromAccount" <?= $account->get('accountId') == $_SESSION['account_id'] ? 'checked' : '' ?> value="<?= $account->get('accountId') ?>"><?= $account->get('name') ?><br>
<?php } ?>
<br>
<?= t('Date du prélèvement') ?> <input type="hidden" id="datePickerHidden" name="fromDate" value="<?php echo date("Y-m-d") ?>"><div id="datePickerInline"></div><br>
</td>

<td style="vertical-align: top;">
<?= t('Vers le placement :') ?><br>
<?php
$accountsHandler = new AccountsHandler();
$accounts = $accountsHandler->GetAllInvestmentAccounts();

foreach ($accounts as $account)
{
?>
<input type="radio" name="toAccount" <?= $account->get('accountId') == $_SESSION['account_id'] ? 'checked' : '' ?> value="<?= $account->get('accountId') ?>"><?= $account->get('name') ?><?= strlen($account->get('description')) > 0 ? ' ('.$account->get('description').')' : ''  ?><br>
<?php
}
?>
<br>
<?= t('Date de prise en compte') ?> <input type="hidden" id="datePickerHidden2" name="toDate" value="<?php echo date("Y-m-d") ?>"><div id="datePickerInline2"></div><br>
</td>

<td style="vertical-align: top;">
<?= t('Versement') ?> <input type="text" name="amount" size="6">&nbsp;&euro;<br>
<?= t('Montant investi') ?> <input type="text" name="amountInvested" size="6">&nbsp;&euro;<br>
<!-- <?= t('Valorisation') ?> <input type="text" name="value" size="6">&nbsp;&euro; (optionnel)<br> -->
<?= t('Désignation') ?> <input type="text" name="designation" id="designation" size="30" value="<?= t('Versement vers placement') ?>">
<br><br>
<input value="<?= t('Ajouter') ?>" id="submitForm" type="submit">
<input id="resetForm" name="reset" value="<?= t('Effacer') ?>" type="reset">
<div id="formResult"></div>
</td>

<td style="vertical-align: top;">
<?= t('Périodicité:') ?><br>
<input type="radio" name="periodicity" value="unique" checked><?= t('unique') ?></input><br>
<input type="radio" name="periodicity" value="monthly"><?= t('tous les mois') ?></input><br>
<?= t('pendant') ?> <input type="text" name="periodicityNumber" size="3"> <?= t('mois') ?>
</td>

</tr>
</table>
</form>