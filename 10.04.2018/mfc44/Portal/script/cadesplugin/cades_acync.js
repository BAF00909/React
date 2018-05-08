define('Nvx.ReDoc.WebInterfaceModule/Content/Scripts/Helpers/asyncSignLibDynamicLoad', [
	'jquery',
	'cadespluginApi',
], function ($) {
	
	var AsyncSignLibDynamicLoad = function () {
		console.log('async');
		var self = this;
		self.CADESCOM_BASE64_TO_BINARY = 1;
		self.CADESCOM_CADES_BES = 1;
		self.CAPICOM_CURRENT_USER_STORE = 2;
		self.CAPICOM_MY_STORE = "My";
		self.CAPICOM_STORE_OPEN_MAXIMUM_ALLOWED = 2;
		self.CAPICOM_CERTIFICATE_FIND_SUBJECT_NAME = 1;
		self.CAPICOM_CERTIFICATE_FIND_SHA1_HASH = 0;
		self.CAPICOM_CERT_INFO_SUBJECT_SIMPLE_NAME = 0;
		self.CAPICOM_CERT_INFO_ISSUER_SIMPLE_NAME = 1;
		self.CAPICOM_CERT_INFO_SUBJECT_EMAIL_NAME = 2;
		self.CAPICOM_ENCODE_BASE64 = 0;
		self.CAPICOM_ENCODE_BINARY = 1;

		self.CADESCOM_XML_SIGNATURE_TYPE_ENVELOPING = 1;
		self.XmlDsigGost3410Url = "urn:ietf:params:xml:ns:cpxmlsec:algorithms:gostr34102001-gostr3411";
		self.XmlDsigGost3411Url = "urn:ietf:params:xml:ns:cpxmlsec:algorithms:gostr3411";
		self.CADESCOM_XML_SIGNATURE_TYPE_ENVELOPED = 0;
		self.CADESCOM_XML_SIGNATURE_TYPE_TEMPLATE = 2;
		


		/**
			* Асинхронная проверка загрузки плагина
			*/
		self.checkForPlugIn_Async = function(){
			var deferred = $.Deferred();
			cadesplugin.async_spawn(function *() {
				var obj = cadesplugin.CreateObjectAsync("CAdESCOM.About");
				//var oAbout = yield cadesplugin.CreateObjectAsync("CAdESCOM.About");
				var oAbout = cadesplugin.CreateObjectAsync("CAdESCOM.About");
				oAbout.then(function(value){
					deferred.resolve(true);
				})
				.catch(function(value){
					deferred.reject();
				});
		
			}); //cadesplugin.async_spawn
	
			return deferred.promise();
		};


		/**
			* Проверить есть ли установленные сертификаты
			*/
		self.isInstalledCertificateExists = function () {
			var deferred = $.Deferred();

			cadesplugin.async_spawn(function *() {
				var oStore = yield cadesplugin.CreateObjectAsync("CAdESCOM.Store");
				if (!oStore) {
					console.error("store failed");
					deferred.resolve(false);
					return;
				}

				try {
					yield oStore.Open();
				}
				catch (ex) {
					console.error("Ошибка при открытии хранилища: " + (ex));
					deferred.resolve(false);
					return;
				}

				var certCnt;
				var certs;

				try {
					certs = yield oStore.Certificates;
					certCnt = yield certs.Count;
				}
				catch (ex) {
					console.error("Ошибка получения сертификатов: " + (ex));
					deferred.resolve(false);
					return;
				}

				if(certCnt > 0){
					deferred.resolve(true);
				}
				else{
					deferred.resolve(false);
				}

				yield oStore.Close();
			});//cadesplugin.async_spawn
	
			return deferred.promise();
		};// self.isInstalledCertificateExists


		/**
			* Получить массив с информацией о сертификатах
			*/
		self.getCertificateInfos = function() {
			var deferred = $.Deferred();
			cadesplugin.async_spawn(function *() {
				var oStore = yield cadesplugin.CreateObjectAsync("CAdESCOM.Store");
				if (!oStore) {
					console.error("store failed");
					deferred.reject();
					return;
				}

				try {
					yield oStore.Open();
				}
				catch (ex) {
					console.error("Ошибка при открытии хранилища: " + (ex));
					deferred.reject();
					return;
				}

				var certCnt;
				var certs;

				try {
					certs = yield oStore.Certificates;
					certCnt = yield certs.Count;
					//certCnt = 1;
				}
				catch (ex) {
					console.error("Ошибка получения сертификатов: " + (ex));
					deferred.reject();
					return;
				}

				if(certCnt == 0)
				{
					console.log("Сертификаты отсутствуют");
					deferred.reject();
					return;
				}
       
				var certInfoArray = [];
	   
				for (var i = 1; i <= certCnt; i++) {
					var cert;

					//TODO: в 1.24 удалить логи получения сертификатов
					var start = new Date();

					try {
						cert = yield certs.Item(i);
					}
					catch (ex) {
						console.error("Ошибка при перечислении сертификатов: " + (ex));
						deferred.reject();
						return;
					}

					var end = new Date();
					

					try {
						start = new Date();
						var subjectName = yield cert.SubjectName;
						end = new Date();

						start = new Date();
						var issuerName = yield cert.IssuerName;
						end = new Date();

						start = new Date();
						var isValid = yield cert.IsValid();
						end = new Date();

						start = new Date();
						var validResult = yield isValid.Result;
						end = new Date();
				
						start = new Date();
						var certThumbprint = yield cert.Thumbprint;
						end = new Date();

						start = new Date();
						var certValidToDate = yield cert.ValidToDate;
						end = new Date();

						//start = new Date();
						//var certBase64 = yield cert.Export(self.CAPICOM_ENCODE_BASE64);
						//end = new Date();
						//console.log('Get certBase64 ' + (end.getTime()-start.getTime()) + ' мс');
						

						var certificateInfo = {
							//Идентификатор.
							thumbprint: certThumbprint,
							//Имя владельца сертификата.
							subjectName: self.getCertName(subjectName),
							// фио владельца сертификата.
							subjectFio: self.getCertSubjectFio(subjectName),
							//Имя издателя.
							issuerName: self.getIssuerName(issuerName),
							//Дата окончания действия сертификата.
							validToDate: certValidToDate,
							//Валиден ли сертификат.
							valid: validResult,
							//Метод получения сертификата
							//exportedBase64: self.getCertificate//certBase64
						};
						

						//e-mail владельца сертификата.
						//не работает в Unix-системах
						try {
							start = new Date();
							certificateInfo.subjectEmail = yield cert.GetInfo(self.CAPICOM_CERT_INFO_SUBJECT_EMAIL_NAME);
							end = new Date();
						}
						catch (e) {
							console.log("Не получил email из сертификата");
							certificateInfo.subjectEmail = "";
						}
				
						certInfoArray.push(certificateInfo);
					}
					catch (ex) {
						console.error("При получении информации : " + (ex));
					}
				}

				yield oStore.Close();

				deferred.resolve(certInfoArray);
			});//cadesplugin.async_spawn
	
			return deferred.promise();
		};//getCertificateInfos


		/** получить значение тэга сертификата */
		self.extract = function (from, what) {
			certName = "";

			var begin = from.indexOf(what);

			if (begin >= 0) {
				begin = begin + what.length;
				var end = from.indexOf(', ', begin);
				certName = (end < 0) ? from.substr(begin) : from.substr(begin, end - begin);
			}

			return certName;
		};

		self.getCertName = function (subjectName) {
			return self.extract(subjectName, 'CN=');
		};	
		
		self.getCertSubjectFio = function (subjectName) {
			var SN = self.extract(subjectName, 'SN=');
			var G = self.extract(subjectName, 'G=');
			return (SN || G) ? SN + " " + G : null;
		};

		self.getIssuerName = function (issuerName) {
			return self.extract(issuerName, 'CN=');
		};

		/**
		* Получить сертификат по его отпечатку
		*/
		self.getCertificate = function (thumbprint) {
			var deferred = $.Deferred();
		
			cadesplugin.async_spawn(function *() {
				var oStore = yield cadesplugin.CreateObjectAsync("CAdESCOM.Store");
				if (!oStore) {
					console.error("store failed");
					deferred.reject();
					return;
				}

				try {
					yield oStore.Open(self.CAPICOM_CURRENT_USER_STORE, self.CAPICOM_MY_STORE,
										self.CAPICOM_STORE_OPEN_MAXIMUM_ALLOWED);
				}
				catch (ex) {
					console.error("Ошибка при открытии хранилища: " + (ex));
					deferred.reject();
					return;
				}

				var certCount;
				var certs;

				try {
					var allCerts = yield oStore.Certificates;
					certs = yield allCerts.Find(self.CAPICOM_CERTIFICATE_FIND_SHA1_HASH, thumbprint);
					certCount = yield certs.Count;
				}
				catch (ex) {
					console.error("Ошибка получения сертификатов: " + (ex));
					deferred.reject();
					return;
				}

				if(certCount == 0)
				{
					alert("Не найден сертификат! Thumbprint: " + thumbprint);
					deferred.reject("Не найден сертификат");
				}
				else
				{
					var cert = yield certs.Item(1);
					deferred.resolve(cert);
				}

				yield oStore.Close();
			});

			return deferred.promise();
		}; //getCertificate

		/**
		 * Получить base64 сертификата по его отпечатку
		 */
		self.getCertificateBase64 = function (thumbprint) {
			var deferred = $.Deferred();
			self.getCertificate(thumbprint).done(function(cert) {
				cadesplugin.async_spawn(function *() {
					var base64 = yield cert.Export(self.CAPICOM_ENCODE_BASE64);
					deferred.resolve(base64);
				});
			})
			.fail(function(error){
				deferred.reject(error);
			});

			return deferred.promise();
		};//getCertificateBase64


		/**
		 * Инициализировать хэш для подписи
		 */
		self.initializeHashedData = function (hashAlg, sHashValue) {

			var deferred = $.Deferred();
		
			cadesplugin.async_spawn(function *() {
				try {
					var oHashedData = yield cadesplugin.CreateObjectAsync("CAdESCOM.HashedData");
					yield oHashedData.propset_Algorithm(hashAlg);
					yield oHashedData.SetHashValue(sHashValue);

					deferred.resolve(oHashedData);
				}
				catch(err){
					deferred.reject(err);
				}
			});

			return deferred.promise();
		};// initializeHashedData

		/**
		 * Создать подпись из хэшированных данных
		 */
		self.createSignHash = function (oCertificate, oHashedData) {
			var deferred = $.Deferred();
		
			cadesplugin.async_spawn(function *() {
				try {
					// Создаем объект
					var oSignedData = yield cadesplugin.CreateObjectAsync("CAdESCOM.CadesSignedData");
					// Создаем объект CAdESCOM.CPSigner
					var oSigner = yield cadesplugin.CreateObjectAsync("CAdESCOM.CPSigner");
					yield oSigner.propset_Certificate(oCertificate);

					var sign = yield oSignedData.SignHash(oHashedData, oSigner, self.CADESCOM_CADES_BES);
					deferred.resolve(sign);
				}
				catch(err){
					deferred.reject(err);
				}
			});

			return deferred.promise();
		};

		/**
		 * Подписать хэш
		 */
		self.signHash = function (hash, hashAlgId, thumbrint){
			var deferred = $.Deferred();
		
			cadesplugin.async_spawn(function *() {
				//получить сертификат
				self.getCertificate(thumbrint).done(function(certificate){
					self.initializeHashedData(hashAlgId, hash).done(function(hashData){
						self.createSignHash (certificate, hashData).done(function(sign){
							deferred.resolve({ digest: sign });
						})
						.fail(function(error){
							deferred.reject(error);
						});
					})
					.fail(function(error){
						deferred.reject(error);
					});
				})
				.fail(function(error){
					deferred.reject(error);
				});
			});

			return deferred.promise();
		}; //signHash


		/**
		* Создать подпись xml
		*/
		self.signXmlCreate = function (oCertificate, dataToSign) { 
			var deferred = $.Deferred();
			
			cadesplugin.async_spawn(function *() {
				var signatureMethod = self.XmlDsigGost3410Url;
				var digestMethod = self.XmlDsigGost3411Url;

				// Создаем объект CAdESCOM.CPSigner
				var oSigner = yield cadesplugin.CreateObjectAsync("CAdESCOM.CPSigner");
				yield oSigner.propset_Certificate(oCertificate);

				// Создаем объект CAdESCOM.SignedXML
				var oSignedXml = yield cadesplugin.CreateObjectAsync("CAdESCOM.SignedXML");

				//Выставляем кодировку Base64.
				if (oSignedXml.ContentEncoding === undefined) {
					//Значит это IE.
				} else {
					yield oSignedXml.propset_ContentEncoding(self.CADESCOM_BASE64_TO_BINARY);
				}

				//Задаем контент.
				yield oSignedXml.propset_Content(dataToSign);

				// Указываем тип подписи - в данном случае вложенная
				yield oSignedXml.propset_SignatureType(self.CADESCOM_XML_SIGNATURE_TYPE_TEMPLATE);

				// Указываем алгоритм подписи
				yield oSignedXml.propset_SignatureMethod(signatureMethod);

				// Указываем алгоритм хэширования
				yield oSignedXml.propset_DigestMethod(digestMethod);

				try {
					var sign = yield oSignedXml.Sign(oSigner);
					deferred.resolve(sign);
				} catch (err) {
					deferred.reject(err);
				}
			});

			return deferred.promise();
		};//signXmlCreate


		/**
		* Подпись Xml
		*/
		self.signXml = function (thumbprint, digestXml) {
			var deferred = $.Deferred();

			self.getCertificate(thumbprint).done(function(cert){
				self.signXmlCreate(cert, digestXml).done(function(signNode){
					cadesplugin.async_spawn(function *() {
						var certBase64 = yield cert.Export(self.CAPICOM_ENCODE_BASE64);
						deferred.resolve( { sign: signNode, cert: certBase64 });
					});
				})
				.fail(function(err){
					deferred.reject(err);
				});
			})
			.fail(function(err){
				deferred.reject(err);
			});

			return deferred.promise().promise();
		}; //signXml


		/**
		* Создание подпись ЭП-ОВ
		*/
		self.signOvCreate = function (oCertificate, dataToSign) {
			var deferred = $.Deferred();

			cadesplugin.async_spawn(function *() {
				// Создаем объект CAdESCOM.CPSigner
				var oSigner = yield cadesplugin.CreateObjectAsync("CAdESCOM.CPSigner");
				yield oSigner.propset_Certificate(oCertificate);

				// Создаем объект CAdESCOM.SignedXML
				var oSignedXml = yield cadesplugin.CreateObjectAsync("CAdESCOM.SignedXML");
				yield oSignedXml.propset_Content(dataToSign);

				// Указываем тип подписи - в данном случае по шаблону
				yield oSignedXml.propset_SignatureType(self.CADESCOM_XML_SIGNATURE_TYPE_TEMPLATE);

				try {
					var sign = yield oSignedXml.Sign(oSigner);
					deferred.resolve(sign);
				} catch (err) {
					deferred.reject(err);
				}
			});

			return deferred.promise();
		};

		/**
		* Подпись Xml ЭП-ОВ плагином
		*/
		self.signXmlOv = function (thumbprint, xmlSourceString) {
			var deferred = $.Deferred();

			self.getCertificate(thumbprint).done(function(cert){
				self.signOvCreate(cert, xmlSourceString).done(function(signNode){
					cadesplugin.async_spawn(function *() {
						var certBase64 = yield cert.Export(self.CAPICOM_ENCODE_BASE64);
						deferred.resolve( { sign: signNode, cert: certBase64 });
					});
					})
				.fail(function(err){
					deferred.reject(err);
				});
			})
			.fail(function(err){
				deferred.reject(err);
			});

			return deferred.promise();
		}; //signXmlOv

		/**
		* Подпись двух Xml ЭП-ОВ в плагине
		*/
		self.sign2XmlOv = function (thumbprint, xmlSourceString, xmlSourceString2) {
			var deferred = $.Deferred();

			self.getCertificate(thumbprint).done(function(cert){
				var promise1 = self.signOvCreate(cert, xmlSourceString);
				var promise2 = self.signOvCreate(cert, xmlSourceString2);

				$.when(promise1, promise2).done(function(signNode1, signNode2){
					deferred.resolve( { sign1: signNode, sign2: signNode2, cert: certBase64 } );
				})
				.fail(function(err){
					deferred.reject( err);
				});
			})
			.fail(function(err){
				deferred.reject(err);
			});
			
			return deferred.promise();
		}; //sign2XmlOv

	};//AsyncSignLib
	

	return new AsyncSignLibDynamicLoad;
});