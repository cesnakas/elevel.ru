<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "������� �level, ������ �level, ������� ������� �level, ����������� �level, ������� ����������� �level, ������� ������, ��������-������������� ���������, ������, ������, ������������� �������, ������������� ������������, ��������, ���, �������������� �����������, ���������������� ��������, �����, �����, ����� �������������� �������, �����������, ����, ���������������� ���������, �����, ������������ ���������, ������������ ���������, ������������������� �������, �������, �����������, ������������������� ������ ����, �������������� ������������, �����������, ����, ����������� �������� �level �� ������ ������, �������� � �����������, �level, ������, �������, �������, ��������, �����������, ������� ������� �level, ����������� �������� �level, ������� ��������� �level, ��������� ��� ������, �level �������");
$APPLICATION->SetPageProperty("title", "�������� � ����������� �������� �level");
$APPLICATION->SetTitle("�������� � �����������");
?> 
<div> 
  <h1>�������� � �����������</h1>
 
<style type="text/css">
td.ramka {text-align:center; vertical-align:top; width:20%;}
td.ramka a{font-size:10px;}
</style>
 
  <p>�� ������������ ��� ��������� ��������, �������, ������� � �����������. �� ������ ������ ������������ c ������� ����������� ��� ������� ��� �������� � ������������ ������ � ������� <img src="/images/aar.gif" alt="������� � �������� �������� �level" title="������� � �������� �������� �level"  />.pdf.</p>
 
  <br />
 
  <div class="voscl"> 				<img class="alert1" src="/i/alert50.gif"  /> 				 
    <br />
   									 
    <p style="display: block;">����� ������������ �� ������ ��������� �������� ���������� �������������� ���������, � ����� ��������� �����������, �� ��������������� �����.</p>
    <?if($_REQUEST["print"] !== "Y"){?>
    <div class="rbutton" align="right"> <span style="color: white; text-decoration: underline; background-color: rgb(224, 86, 21); border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; height: 30px; padding: 5px 15px; cursor: pointer; display: block;" class="print_cat">�������� �������� ��������</span></div>
    <?}?>
   </div>
 
  <br />
 <?/*
  <tr><td colspan="5"><strong>�������� ��������� �� ��������������</strong></tr>
  <tr>
  <td ><a id="bxid_751948" href="/cat/ABB/abb_nvo.pdf" title="������������� ������������ ABB" target="_blank" ><img id="bxid_872854" src="/cat/abb_nvo.png" alt="������������� ������������ ABB" title="������������� ������������ ABB"  /><br>����� ������� �������������� ������������ ABB</a></td>
  <td ><a id="bxid_234549" href="/cat/ABB/abb_liflet.pdf" title="������������� ������������ ABB" target="_blank" ><img id="bxid_274576" src="/cat/abb_liflet.png" alt="������������� ������������ ABB" title="������������� ������������ ABB"  /><br>����� ������ �������������� ������������ ABB</a></td>
  <td ><a id="bxid_965513" href="/cat/ABB/abb_bjb.pdf" title="������������������� ������� Busch-Jaeger" target="_blank" ><img id="bxid_34471" src="/cat/abb_bjb.png" alt="������������������� ������� Busch-Jaeger" title="������������������� ������� Busch-Jaeger"  /><br>������������������� ������� ABB</a></td>
  <td ><a id="bxid_894710" href="/cat/Anam/anam_cat.pdf" title="������� ��������� Anam" target="_blank" ><img id="bxid_869965" src="/cat/anam_cat_2011.png" alt="������� ��������� Anam" title="������� ��������� Anam"  /><br>����� ������� Anam</a></td>
  <td ><a id="bxid_240525" href="/cat/Anam/anam_liflet.pdf" title="������ Anam" target="_blank" ><img id="bxid_286269" src="/cat/anam_liflet.png" alt="������ Anam" title="������ Anam"  /><br>������ Anam</a></td>
  </tr>  
  
  <tr>
  <td ><a id="bxid_722531" href="/cat/Legrand/legrand_nvo.pdf" title="������� Legrand ������������� ������������" target="_blank" ><img id="bxid_728058" src="/cat/Legrand/legrand_nvo.png" alt="������� Legrand ������������� ������������" title="������� Legrand ������������� ������������"  /><br>������������� ������������ Legrand</a></td>
  <td ><a id="bxid_458239" href="/cat/Legrand/legrand_liflet.pdf" title="����� ������ ������������������" target="_blank" ><img id="bxid_753764" src="/cat/Legrand/legrand_liflet.png" alt="����� ������ ������������������" title="����� ������ ������������������"  /><br>����� ������ ������������������ Lergand</a></td>
  <td ><a id="bxid_171158" href="/cat/se/se_nvo.pdf" title="������ �������������� ������������ Schneider Electric" target="_blank" ><img id="bxid_793707" src="/cat/se/se_nvo.png" alt="������ �������������� ������������ Schneider Electric" title="������ �������������� ������������ Schneider Electric"  /><br>������ �������������� ������������ Schneider Electric</a></td>
  <td ><a id="bxid_416109" href="/cat/se/se_liflet.pdf" title="������ ������������ ������� Schneider Electric" target="_blank" ><img id="bxid_785835" src="/cat/se/se_liflet.png" alt="������ ������������ ������� Schneider Electric" title="������ ������������ ������� Schneider Electric"  /><br>������ ������������ ������� Schneider Electric</a></td>
  <td ><a id="bxid_115070" href="/cat/Merten/merten_liflet.pdf" title="������ ��������� Merten 2010" target="_blank" ><img id="bxid_132963" src="/cat/Merten/merten_liflet.png" alt="������ ��������� Merten 2010" title="������ ��������� Merten 2010"  /><br>������ ��������� Merten</a></td>
  </tr>  
  <tr>
  <td ><a id="bxid_517600" href="/cat/DKS/dks_liflet.pdf" title="������ ��������� ���" target="_blank" ><img id="bxid_53700" src="/cat/DKS/dks_liflet.png" alt="������ ��������� ���" title="������� ��������� ���"  /><br>����� ������ ��������� ���</a></td>
  <td ><a id="bxid_97796" href="/cat/Gira/gira_liflet.pdf" title="������ ��������� Gira" target="_blank" ><img id="bxid_869676" src="/cat/Gira/gira_liflet.png" alt="������ ��������� Gira" title="������� ��������� Gira"  /><br>������ Gira</a></td>
  <td ><a id="bxid_150514" href="/cat/Hensel/hensel_liflet.pdf" title="������ ��������� Hensel" target="_blank" ><img id="bxid_760766" src="/cat/Hensel/hensel_liflet.png" alt="������ ��������� Hensel" title="������ ��������� Hensel"  /><br>����� ������ Hensel</a></td>
  <td ><a id="bxid_66931" href="/cat/Simon/simon_liflet.pdf" title="������ ����� Simon" target="_blank" ><img id="bxid_185970" src="/cat/Simon/simon_liflet.png" alt="������ ����� Simon" title="������ ����� Simon"  /><br>������ ��������� Simon</a></td>
  <td ><a id="bxid_684584" href="/cat/chel/chel_liflet.pdf" title="����� ������ ���������" target="_blank" ><img id="bxid_820196" src="/cat/chel/chel_liflet.png" alt="����� ������ ���������" title="����� ������ ���������"  /><br>����� ������ ��������� ������������������</a></td>
  </tr>
  */?> 
  <br />
 
  <br />
 <center> 
    <table class="tz-center" cellspacing="5" cellpadding="5" width="100%">
      <tbody> 	 
        <tr> <td colspan="5"> 
            <h2>������� � ��������</h2>
           </td></tr>
       
        <tr> <td width="50%"><a href="/cat/elevel/elevel_buklet.pdf" title="������ ����������� �������� �level" target="_blank" ><img src="/cat/elevel/elevel_buklet.png" alt="������ ����������� �������� �level" title="������ ����������� �������� �level" class="sol_bp"  /> 
              <br />
             <center>�level</center></a></td> <td width="50%"><a href="/cat/elevel/elevel_engineer_buklet.pdf" title="������ ����������� �������� �level �������" target="_blank" ><img src="/cat/elevel/elevel_engineer_buklet.png" alt="������ ����������� �������� �level �������" title="������ ����������� �������� �level �������" class="sol_bp"  /> 
              <br />
             <center>�level �������</center></a></td></tr>
       </tbody>
     </table>
   </center> 
  <br />
 
  <br />
 <center> 
    <table cellspacing="5" cellpadding="5" width="100%" class="tz-center"> 	 
      <tbody> 	 
        <tr> <td colspan="5"> 
            <h2>�������� ��������� �� �������� �������</h2>
           </td></tr>
       
        <tr> <td width="25%"><a href="/cat/elevel/elevel_shields.pdf" title="������� ������������� ����������� ��������� (���) �level" target="_blank" ><img src="/cat/elevel/elevel_shields.png" alt="������� ������������� ����������� ��������� (���) �level" title="������� ������������� ����������� ��������� (���) �level" class="sol_bp"  /> 
              <br />
             ������������� ����������� ���������� (���)</a></td> <td width="25%"><a href="/cat/elevel/elevel_cable.pdf" title="������� ��������-������������� ��������� (���) �level" target="_blank" ><img src="/cat/elevel/elevel_cable.png" alt="������� ��������-������������� ��������� (���) �level" title="������� ��������-������������� ��������� (���) �level" class="sol_bp"  /> 
              <br />
             ��������-������������� ��������� (���)</a></td> <td width="25%"><a href="/cat/elevel/elevel_nvo.pdf" title="������� �������������� ������������ (���) �level" target="_blank" ><img src="/cat/elevel/elevel_nvo.png" alt="������� �������������� ������������ (���) �level" title="������� �������������� ������������ (���) �level" class="sol_bp"  /> 
              <br />
             ������������� ������������ (���)</a></td> <td width="25%"><a href="/cat/elevel/elevel_stp.pdf" title="������� ���������������� ��������� (���) �level" target="_blank" ><img src="/cat/elevel/elevel_stp.png" alt="������� ���������������� ��������� (���) �level" title="������� ���������������� ��������� (���) �level" class="sol_bp"  /> 
              <br />
             ���������������� ��������� (���)</a></td> </tr>
       </tbody>
     </table>
   </center> 
  <br />
 
  <br />
 <center> 
    <table cellspacing="5" cellpadding="5" width="100%" class="tz-center"> 	 
      <tbody> 	 
        <tr> <td width="50%"><a href="/cat/elevel/elevel_buklet_kpp.pdf" title="������ ��������-������������� ��������� �level" target="_blank" ><img src="/cat/elevel/elevel_buklet_kpp.png" alt="������ ��������-������������� ��������� �level" title="������ ��������-������������� ��������� �level" class="sol_bp"  /> 
              <br />
             ��������-������������� ��������� (������)</a></td> <td width="50%"><a href="/cat/elevel/elevel_deluxe_wt.pdf" title="������� ������������������� ������� ���� (��� ����) �level" target="_blank" ><img src="/cat/elevel/elevel_deluxe_wt.png" alt="������� ������������������� ������� ���� (��� ����) �level" title="������� ������������������� ������� ���� (��� ����) �level" class="sol_bp"  /> 
              <br />
             ������������������� ������� ���� (��� ����)</a></td></tr>
       </tbody>
     </table>
   </center> 
  <br />
 
  <br />
 <center> 
    <table cellspacing="5" cellpadding="5" width="100%" class="tz-center"> 	 
      <tbody> 
        <tr><td colspan="5"> 
            <h2>�������� ������� �� ��������� �����</h2>
           </td></tr>
       
        <tr> <td width="33%"><a href="/cat/elevel/ei_admin_log.pdf" title="������ ������� �� �level ��� ���������������� ������" target="_blank" ><img src="/cat/elevel/ei_admin_log-1.png" alt="������ ������� �� �level ��� ���������������� ������" title="������ ������� �� �level ��� ���������������� ������" class="sol_bp"  /> 
              <br />
             ��� ���������������� ������</a></td> <td width="33%"><a href="/cat/elevel/elevel_resheniya_cottage.pdf" title="������ ������� �� �level ��� ��������� � �������" target="_blank" ><img src="/cat/elevel/ei_kot_log-1.png" alt="������ ������� �� �level ��� ��������� � �������" title="������ ������� �� �level ��� ��������� � �������" class="sol_bp"  /> 
              <br />
             ��� ��������� � �������</a></td> <td width="33%"><a href="/cat/elevel/elevel_resheniya_hotel.pdf" title="������ ������� �� �level ��� ��������" target="_blank" ><img src="/cat/elevel/ei_hotels_log-1.png" alt="������ ������� �� �level ��� ��������" title="������ ������� �� �level ��� ��������" class="sol_bp"  /> 
              <br />
             <center>��� ��������</center></a></td> </tr>
       </tbody>
     </table>
   </center> 
  <br />
 
  <br />
 <center> 
    <table cellspacing="5" cellpadding="5" width="100%" class="tz-center"> 	 
      <tbody> 
        <tr><td colspan="5"> 
            <h2>���������� �������</h2>
           </td></tr>
       
        <tr> <td width="50%"><a href="/cat/elevel/elevel_prof.pdf" title="������ �������� �level ��� ��������������" target="_blank" ><img src="/cat/elevel/elevel_prof.png" alt="������ �������� �level ��� ��������������" title="������ �������� �level ��� ��������������" class="sol_bp"  /> 
              <br />
             ��� ��������������</a></td> <td width="50%"><a href="/cat/elevel/elevel_trade.pdf" title="������ �������� �level ��� �������� ��������" target="_blank" ><img src="/cat/elevel/elevel_trade.png" alt="������ �������� �level ��� �������� ��������" title="������ �������� �level ��� �������� ��������" class="sol_bp"  /> 
              <br />
             ��� �������� ��������</a></td> </tr>
       </tbody>
     </table>
   </center> 
  <br />
 
  <br />
 
  <p>����� �� ������ ������������ � ������������� �������� �� 6 ������ � ������� <img src="/images/ppt_sm.gif" alt="����������� �������� �level" title="����������� �������� �level"  />.ppt:</p>
 
  <br />
 
  <div> 
    <ul> 
      <li style="list-style: none;"><a href="/Presentation_ru.ppt" title="����������� �������� �level �� ������� �����" target="_blank" > <img src="/i/icon25a.gif" alt="����������� �������� �level �� ������� �����" title="����������� �������� �level �� ������� �����"  /></a> <a href="/Presentation_ru.ppt" target="_blank" title="����������� �������� �level �� ������� �����" ><strong>����������� �������� �� �������</strong></a></li>
     
      <br />
     
      <li style="list-style: none;"><a href="/Presentation_en.ppt" title="Company profile in English" target="_blank" ><img src="/i/icon25b.gif" alt="Company profile in English" title="Company profile in English"  /></a> <a href="/Presentation_en.ppt" target="_blank" title="Company profile in English" ><strong>Company profile in English</strong></a></li>
     
      <br />
     
      <li style="list-style: none;"><a href="/Presentation_du.ppt" title="Vorstellung der deutschen" target="_blank" ><img src="/i/icon25c.gif" alt="Vorstellung der deutschen" title="Vorstellung der deutschen"  /></a> <a href="/Presentation_du.ppt" target="_blank" title="Vorstellung der deutschen" ><strong>Vorstellung der deutschen</strong></a></li>
     
      <br />
     
      <li style="list-style: none;"><a href="/Presentation_fr.ppt" title="Francaise presentation de la compagnie" target="_blank" > <img src="/i/icon25d.gif" alt="Francaise presentation de la compagnie" title="Francaise presentation de la compagnie"  /></a> <a href="/Presentation_fr.ppt" target="_blank" title="Francaise presentation de la compagnie" > <strong>Francaise presentation de la compagnie</strong></a></li>
     
      <br />
     
      <li style="list-style: none;"><a href="/Presentation_it.ppt" title="Presentazione da parte italiana" target="_blank" > <img src="/i/icon25e.gif" alt="Presentazione da parte italiana" title="Presentazione da parte italiana"  /></a> <a href="/Presentation_it.ppt" target="_blank" title="Presentazione da parte italiana" ><strong>Presentazione da parte italiana</strong></a></li>
     
      <br />
     
      <li style="list-style: none;"><a href="/Presentation_pl.ppt" title="Prezentacja firmy w j&amp;#281;zyku polskim" target="_blank" > <img src="/i/icon25f.gif" alt="Prezentacja firmy w j&amp;#281;zyku polskim" title="Prezentacja firmy w j&amp;#281;zyku polskim"  /></a> <a href="/Presentation_pl.ppt" target="_blank" title="Prezentacja firmy w j&amp;#281;zyku polskim" ><strong>Prezentacja firmy w j&#281;zyku polskim</strong></a></li>
     
      <br />
     </ul>
   </div>
 
  <p></p>
 </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>