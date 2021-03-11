function _rs_CreateXMLHttpRequest()
{
	var xmlReq = false;
	if (window.XMLHttpRequest)
	{
		try
		{
			xmlReq = new XMLHttpRequest();
		}
		catch(e)
		{
			xmlReq = false;
		}
	}
	else 
		if (window.ActiveXObject)
		{
			try
			{
				xmlReq = new  ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
				try
				{
					xmlReq = new  ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e)
				{
					xmlReq = false;
				}
			}
		}
	return xmlReq;
}

function _rs_CallServer(method, url, data, dataType, func, arg)
{
	if (!method) method='GET';
	var xmlReq = _rs_CreateXMLHttpRequest();
	
	if (xmlReq)
	{
		xmlReq.onreadystatechange = function() 
		{
			var iReadyState = xmlReq.readyState;
			func(iReadyState, arg, (iReadyState == 4)?xmlReq.responseText:null,  (iReadyState == 4)?xmlReq.responseXML:null, (iReadyState == 4)?xmlReq.status:null, (iReadyState == 4)?xmlReq.statusText:null);
		};
		xmlReq.open(method, url, true);
		if (data)
		{
			if (!dataType)
				dataType='application/xml';
			if (typeof(data)!="string" && dataType.indexOf("charset=")<0 && userAgent.isMozilla) 
				dataType=dataType+';charset=utf-8';
			xmlReq.setRequestHeader('Content-Type', dataType);
		}
		xmlReq.send(data);
		return false;
	}
	return true;
}

function _orderGetFieldByName(name)
{
	var x = document.getElementsByName(name);
	if (x.length < 1)
		return false;
	return x[0];
}

function _formSetFields(RequestState, element, responseText, responseXML, statusCode, statusText)
{	
	if (RequestState == 4)
	{
		if (statusCode==200 || statusCode==201)
		{
			var xmlDoc = responseXML.documentElement;
			var dataArray = xmlDoc.getElementsByTagName("field");
			for (var i = 0; i < dataArray.length; i++)
			{
				var field = _orderGetFieldByName(xmlDoc.getElementsByTagName("name")[i].childNodes[0].nodeValue);
				if (field)
					field.value = xmlDoc.getElementsByTagName("value")[i].childNodes[0].nodeValue;
			}
		}
	}
}

function _formGetFields()
{
	var i = 1;
	var params = '';
	var cnt = _orderGetFieldByName('count1');
	if (cnt)
		params = 'count1='+cnt.value;
	for (i=2;i<15;i++)
	{
		var cnt = _orderGetFieldByName('count'+i);
		if (cnt)
			params += '&count'+i+'='+cnt.value;
	}
	_rs_CallServer('POST', '/ax/sh-calc.php', params, 'application/x-www-form-urlencoded', _formSetFields, 0);
}

function _e(id) 
{ 
	return document.getElementById(id);
}