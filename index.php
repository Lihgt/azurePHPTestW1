<?php

echo "
<!DOCTYPE html>
<html>
<head></head>
<body>
<h3>Добрый день!</h3>
<br>
<br>

<script type=\"text/javascript\">
//var wshNetwork = new ActiveXObject(\"WScript.Network\");
var sysInfo    = new ActiveXObject(\"ADSystemInfo\");
var us = sysInfo.UserName;

console.log (\"User: \" + sysInfo.UserName);
console.log (\"Computer: \" + sysInfo.ComputerName);
console.log (\"Site: \" + sysInfo.SiteName);
console.log (\"Domain DNS: \" + sysInfo.DomainDNSName);
console.log (\"Forest DNS: \" + sysInfo.ForestDNSName);
console.log (\"Domain: \" + sysInfo.DomainShortName);
console.log (\"PDC Role Owner: \" + sysInfo.PDCRoleOwner);
console.log (\"Schema Role Owner: \" + sysInfo.SchemaRoleOwner);


showUsers();

function GetFieldValue(objField){
    var result = \"\";
    if (objField.Value == null){
    }
    else{
        if (objField.type == 12){
          var ldapArr = objField.Value.toArray();
          result = ldapArr[0];
        }
        else{
          result = objField.Value;
        }
    }
    return result;
}//GetFieldValue

function showUsers(){
  var strAttributes, strFilter, SrchCriteria, strQuery;

  strAttributes = \"cn,sn,title,mail,mobile,telephoneNumber\";
  SrchCriteria=\"(sAMAccountType=805306368)\";

  var ADOConnection = new ActiveXObject(\"ADODB.Connection\");
  var ADOCommand = new ActiveXObject(\"ADODB.Command\");
  var ADORecordSet = new ActiveXObject(\"ADODB.RecordSet\");
  ADOConnection.Provider = \"ADsDSOObject\";
  strBase = \"<LDAP://\" + us + \">\";

try {
  ADOConnection.Open(\"ADs Provider\");
  ADOCommand.ActiveConnection = ADOConnection;
  strFilter = SrchCriteria;
  strQuery = strBase + \";\" + strFilter + \";\" + strAttributes + \";subtree\";
  console.log(strQuery);

  ADOCommand.CommandText = strQuery;
  ADORecordSet = ADOCommand.Execute();

  if (ADORecordSet.RecordCount > 0) {
    ADORecordSet.MoveFirst;
    while (! ADORecordSet.EOF){
      console.log (\"title: \"+GetFieldValue(ADORecordSet.Fields(\"title\")));
      console.log (\"name: \"+GetFieldValue(ADORecordSet.Fields(\"cn\")));
      console.log (\"mail: \"+GetFieldValue(ADORecordSet.Fields(\"mail\")));
      console.log (\"mobile: \"+GetFieldValue(ADORecordSet.Fields(\"mobile\")));
	    console.log (\"phone: \"+GetFieldValue(ADORecordSet.Fields(\"telephoneNumber\")));
      ADORecordSet.MoveNext;
    }
  }//if 
  ADORecordSet.Close();
} catch(e) {  console.log (e.message); } 
} //showUsers

</script>
</body>
</html>
"
?>
