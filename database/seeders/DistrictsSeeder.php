<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Districts;
class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $array = [
                  [1,"ANANTAPUR"  ],
                  [1,"CHITTOOR"  ],
                  [1,"EAST GODAVARI"  ],
                  [1,"GUNTUR"  ],
                  [1,"KRISHNA"  ],
                  [1,"KURNOOL"  ],
                  [1,"PRAKASAM"  ],
                  [1,"SPSR NELLORE"  ],
                  [1,"SRIKAKULAM"  ],
                  [1,"VISAKHAPATANAM"  ],
                  [1,"VIZIANAGARAM"  ],
                  [1,"WEST GODAVARI"  ],
                  [1,"Y.S.R."  ],
                  [2,"ANJAW"  ],
                  [2,"CHANGLANG"  ],
                  [2,"DIBANG VALLEY"  ],
                  [2,"EAST KAMENG"  ],
                  [2,"EAST SIANG"  ],
                  [2,"Kra Daadi"  ],
                  [2,"KURUNG KUMEY"  ],
                  [2,"LOHIT"  ],
                  [2,"LONGDING"  ],
                  [2,"LOWER DIBANG VALLEY"  ],
                  [2,"LOWER SUBANSIRI"  ],
                  [2,"NAMSAI"  ],
                  [2,"PAPUM PARE"  ],
                  [2,"SIANG"  ],
                  [2,"TAWANG"  ],
                  [2,"TIRAP"  ],
                  [2,"UPPER SIANG"  ],
                  [2,"UPPER SUBANSIRI"  ],
                  [2,"WEST KAMENG"  ],
                  [2,"WEST SIANG"  ],
                  [3,"BAKSA"  ],
                  [3,"BARPETA"  ],
                  [3,"BONGAIGAON"  ],
                  [3,"CACHAR"  ],
                  [3,"CHIRANG"  ],
                  [3,"DARRANG"  ],
                  [3,"DHEMAJI"  ],
                  [3,"DHUBRI"  ],
                  [3,"DIBRUGARH"  ],
                  [3,"DIMA HASAO"  ],
                  [3,"GOALPARA"  ],
                  [3,"GOLAGHAT"  ],
                  [3,"HAILAKANDI"  ],
                  [3,"JORHAT"  ],
                  [3,"KAMRUP"  ],
                  [3,"KAMRUP METRO"  ],
                  [3,"KARBI ANGLONG"  ],
                  [3,"KARIMGANJ"  ],
                  [3,"KOKRAJHAR"  ],
                  [3,"LAKHIMPUR"  ],
                  [3,"MARIGAON"  ],
                  [3,"NAGAON"  ],
                  [3,"NALBARI"  ],
                  [3,"SIVASAGAR"  ],
                  [3,"SONITPUR"  ],
                  [3,"TINSUKIA"  ],
                  [3,"UDALGURI"  ],
                  [4,"ARARIA"  ],
                  [4,"ARWAL"  ],
                  [4,"AURANGABAD"  ],
                  [4,"BANKA"  ],
                  [4,"BEGUSARAI"  ],
                  [4,"BHAGALPUR"  ],
                  [4,"BHOJPUR"  ],
                  [4,"BUXAR"  ],
                  [4,"DARBHANGA"  ],
                  [4,"GAYA"  ],
                  [4,"GOPALGANJ"  ],
                  [4,"JAMUI"  ],
                  [4,"JEHANABAD"  ],
                  [4,"KAIMUR (BHABUA)"  ],
                  [4,"KATIHAR"  ],
                  [4,"KHAGARIA"  ],
                  [4,"KISHANGANJ"  ],
                  [4,"LAKHISARAI"  ],
                  [4,"MADHEPURA"  ],
                  [4,"MADHUBANI"  ],
                  [4,"MUNGER"  ],
                  [4,"MUZAFFARPUR"  ],
                  [4,"NALANDA"  ],
                  [4,"NAWADA"  ],
                  [4,"PASHCHIM CHAMPARAN"  ],
                  [4,"PATNA"  ],
                  [4,"PURBI CHAMPARAN"  ],
                  [4,"PURNIA"  ],
                  [4,"ROHTAS"  ],
                  [4,"SAHARSA"  ],
                  [4,"SAMASTIPUR"  ],
                  [4,"SARAN"  ],
                  [4,"SHEIKHPURA"  ],
                  [4,"SHEOHAR"  ],
                  [4,"SITAMARHI"  ],
                  [4,"SIWAN"  ],
                  [4,"SUPAUL"  ],
                  [4,"VAISHALI"  ],
                  [5,"BALOD"  ],
                  [5,"BALODA BAZAR"  ],
                  [5,"BALRAMPUR"  ],
                  [5,"BASTAR"  ],
                  [5,"BEMETARA"  ],
                  [5,"BIJAPUR"  ],
                  [5,"BILASPUR"  ],
                  [5,"DANTEWADA"  ],
                  [5,"DHAMTARI"  ],
                  [5,"DURG"  ],
                  [5,"GARIYABAND"  ],
                  [5,"JANJGIR-CHAMPA"  ],
                  [5,"JASHPUR"  ],
                  [5,"KABIRDHAM"  ],
                  [5,"KANKER"  ],
                  [5,"KONDAGAON"  ],
                  [5,"KORBA"  ],
                  [5,"KOREA"  ],
                  [5,"MAHASAMUND"  ],
                  [5,"MUNGELI"  ],
                  [5,"NARAYANPUR"  ],
                  [5,"RAIGARH"  ],
                  [5,"RAIPUR"  ],
                  [5,"RAJNANDGAON"  ],
                  [5,"SUKMA"  ],
                  [5,"SURAJPUR"  ],
                  [5,"SURGUJA"  ],
                  [6,"NORTH GOA"  ],
                  [6,"SOUTH GOA"  ],
                  [7,"AHMADABAD"  ],
                  [7,"AMRELI"  ],
                  [7,"ANAND"  ],
                  [7,"ARVALLI"  ],
                  [7,"BANAS KANTHA"  ],
                  [7,"BHARUCH"  ],
                  [7,"BHAVNAGAR"  ],
                  [7,"BOTAD"  ],
                  [7,"CHHOTAUDEPUR"  ],
                  [7,"DANG"  ],
                  [7,"DEVBHUMI DWARKA"  ],
                  [7,"DOHAD"  ],
                  [7,"GANDHINAGAR"  ],
                  [7,"GIR SOMNATH"  ],
                  [7,"JAMNAGAR"  ],
                  [7,"JUNAGADH"  ],
                  [7,"KACHCHH"  ],
                  [7,"KHEDA"  ],
                  [7,"MAHESANA"  ],
                  [7,"Mahisagar"  ],
                  [7,"MORBI"  ],
                  [7,"NARMADA"  ],
                  [7,"NAVSARI"  ],
                  [7,"PANCH MAHALS"  ],
                  [7,"PATAN"  ],
                  [7,"PORBANDAR"  ],
                  [7,"RAJKOT"  ],
                  [7,"SABAR KANTHA"  ],
                  [7,"SURAT"  ],
                  [7,"SURENDRANAGAR"  ],
                  [7,"TAPI"  ],
                  [7,"VADODARA"  ],
                  [7,"VALSAD"  ],
                  [8,"AMBALA"  ],
                  [8,"BHIWANI"  ],
                  [8,"CHARKI DADRI"  ],
                  [8,"FARIDABAD"  ],
                  [8,"FATEHABAD"  ],
                  [8,"GURUGRAM"  ],
                  [8,"HISAR"  ],
                  [8,"JHAJJAR"  ],
                  [8,"JIND"  ],
                  [8,"KAITHAL"  ],
                  [8,"KARNAL"  ],
                  [8,"KURUKSHETRA"  ],
                  [8,"MAHENDRAGARH"  ],
                  [8,"MEWAT"  ],
                  [8,"PALWAL"  ],
                  [8,"PANCHKULA"  ],
                  [8,"PANIPAT"  ],
                  [8,"REWARI"  ],
                  [8,"ROHTAK"  ],
                  [8,"SIRSA"  ],
                  [8,"SONIPAT"  ],
                  [8,"YAMUNANAGAR"  ],
                  [9,"BILASPUR"  ],
                  [9,"CHAMBA"  ],
                  [9,"HAMIRPUR"  ],
                  [9,"KANGRA"  ],
                  [9,"KINNAUR"  ],
                  [9,"KULLU"  ],
                  [9,"LAHUL AND SPITI"  ],
                  [9,"MANDI"  ],
                  [9,"SHIMLA"  ],
                  [9,"SIRMAUR"  ],
                  [9,"SOLAN"  ],
                  [9,"UNA"  ],
                  [10,"ANANTNAG"  ],
                  [10,"BADGAM"  ],
                  [10,"BANDIPORA"  ],
                  [10,"BARAMULLA"  ],
                  [10,"DODA"  ],
                  [10,"GANDERBAL"  ],
                  [10,"JAMMU"  ],
                  [10,"KARGIL"  ],
                  [10,"KATHUA"  ],
                  [10,"KISHTWAR"  ],
                  [10,"KULGAM"  ],
                  [10,"KUPWARA"  ],
                  [10,"LEH LADAKH"  ],
                  [10,"POONCH"  ],
                  [10,"PULWAMA"  ],
                  [10,"RAJAURI"  ],
                  [10,"RAMBAN"  ],
                  [10,"REASI"  ],
                  [10,"SAMBA"  ],
                  [10,"SHOPIAN"  ],
                  [10,"SRINAGAR"  ],
                  [10,"UDHAMPUR"  ],
                  [11,"BOKARO"  ],
                  [11,"CHATRA"  ],
                  [11,"DEOGHAR"  ],
                  [11,"DHANBAD"  ],
                  [11,"DUMKA"  ],
                  [11,"EAST SINGHBUM"  ],
                  [11,"GARHWA"  ],
                  [11,"GIRIDIH"  ],
                  [11,"GODDA"  ],
                  [11,"GUMLA"  ],
                  [11,"HAZARIBAGH"  ],
                  [11,"JAMTARA"  ],
                  [11,"KHUNTI"  ],
                  [11,"KODERMA"  ],
                  [11,"LATEHAR"  ],
                  [11,"LOHARDAGA"  ],
                  [11,"PAKUR"  ],
                  [11,"PALAMU"  ],
                  [11,"RAMGARH"  ],
                  [11,"RANCHI"  ],
                  [11,"SAHEBGANJ"  ],
                  [11,"SARAIKELA KHARSAWAN"  ],
                  [11,"SIMDEGA"  ],
                  [11,"WEST SINGHBHUM"  ],
                  [12,"BAGALKOT"  ],
                  [12,"BALLARI"  ],
                  [12,"BELAGAVI"  ],
                  [12,"BENGALURU RURAL"  ],
                  [12,"BENGALURU URBAN"  ],
                  [12,"BIDAR"  ],
                  [12,"CHAMARAJANAGAR"  ],
                  [12,"CHIKBALLAPUR"  ],
                  [12,"CHIKKAMAGALURU"  ],
                  [12,"CHITRADURGA"  ],
                  [12,"DAKSHIN KANNAD"  ],
                  [12,"DAVANGERE"  ],
                  [12,"DHARWAD"  ],
                  [12,"GADAG"  ],
                  [12,"HASSAN"  ],
                  [12,"HAVERI"  ],
                  [12,"KALABURAGI"  ],
                  [12,"KODAGU"  ],
                  [12,"KOLAR"  ],
                  [12,"KOPPAL"  ],
                  [12,"MANDYA"  ],
                  [12,"MYSURU"  ],
                  [12,"RAICHUR"  ],
                  [12,"RAMANAGARA"  ],
                  [12,"SHIVAMOGGA"  ],
                  [12,"TUMAKURU"  ],
                  [12,"UDUPI"  ],
                  [12,"UTTAR KANNAD"  ],
                  [12,"VIJAYAPURA"  ],
                  [12,"YADGIR"  ],
                  [13,"ALAPPUZHA"  ],
                  [13,"ERNAKULAM"  ],
                  [13,"IDUKKI"  ],
                  [13,"KANNUR"  ],
                  [13,"KASARAGOD"  ],
                  [13,"KOLLAM"  ],
                  [13,"KOTTAYAM"  ],
                  [13,"KOZHIKODE"  ],
                  [13,"MALAPPURAM"  ],
                  [13,"PALAKKAD"  ],
                  [13,"PATHANAMTHITTA"  ],
                  [13,"THIRUVANANTHAPURAM"  ],
                  [13,"THRISSUR"  ],
                  [13,"WAYANAD"  ],
                  [14,"AGAR MALWA"  ],
                  [14,"ALIRAJPUR"  ],
                  [14,"ANUPPUR"  ],
                  [14,"ASHOKNAGAR"  ],
                  [14,"BALAGHAT"  ],
                  [14,"BARWANI"  ],
                  [14,"BETUL"  ],
                  [14,"BHIND"  ],
                  [14,"BHOPAL"  ],
                  [14,"BURHANPUR"  ],
                  [14,"CHHATARPUR"  ],
                  [14,"CHHINDWARA"  ],
                  [14,"DAMOH"  ],
                  [14,"DATIA"  ],
                  [14,"DEWAS"  ],
                  [14,"DHAR"  ],
                  [14,"DINDORI"  ],
                  [14,"EAST NIMAR"  ],
                  [14,"GUNA"  ],
                  [14,"GWALIOR"  ],
                  [14,"HARDA"  ],
                  [14,"HOSHANGABAD"  ],
                  [14,"INDORE"  ],
                  [14,"JABALPUR"  ],
                  [14,"JHABUA"  ],
                  [14,"KATNI"  ],
                  [14,"KHARGONE"  ],
                  [14,"MANDLA"  ],
                  [14,"MANDSAUR"  ],
                  [14,"MORENA"  ],
                  [14,"NARSINGHPUR"  ],
                  [14,"NEEMUCH"  ],
                  [14,"PANNA"  ],
                  [14,"RAISEN"  ],
                  [14,"RAJGARH"  ],
                  [14,"RATLAM"  ],
                  [14,"REWA"  ],
                  [14,"SAGAR"  ],
                  [14,"SATNA"  ],
                  [14,"SEHORE"  ],
                  [14,"SEONI"  ],
                  [14,"SHAHDOL"  ],
                  [14,"SHAJAPUR"  ],
                  [14,"SHEOPUR"  ],
                  [14,"SHIVPURI"  ],
                  [14,"SIDHI"  ],
                  [14,"SINGRAULI"  ],
                  [14,"TIKAMGARH"  ],
                  [14,"UJJAIN"  ],
                  [14,"UMARIA"  ],
                  [14,"VIDISHA"  ],
                  [15,"AHMEDNAGAR"  ],
                  [15,"AKOLA"  ],
                  [15,"AMRAVATI"  ],
                  [15,"AURANGABAD"  ],
                  [15,"BEED"  ],
                  [15,"BHANDARA"  ],
                  [15,"BULDHANA"  ],
                  [15,"CHANDRAPUR"  ],
                  [15,"DHULE"  ],
                  [15,"GADCHIROLI"  ],
                  [15,"GONDIA"  ],
                  [15,"HINGOLI"  ],
                  [15,"JALGAON"  ],
                  [15,"JALNA"  ],
                  [15,"KOLHAPUR"  ],
                  [15,"LATUR"  ],
                  [15,"MUMBAI"  ],
                  [15,"MUMBAI SUBURBAN"  ],
                  [15,"NAGPUR"  ],
                  [15,"NANDED"  ],
                  [15,"NANDURBAR"  ],
                  [15,"NASHIK"  ],
                  [15,"OSMANABAD"  ],
                  [15,"PALGHAR"  ],
                  [15,"PARBHANI"  ],
                  [15,"PUNE"  ],
                  [15,"RAIGAD"  ],
                  [15,"RATNAGIRI"  ],
                  [15,"SANGLI"  ],
                  [15,"SATARA"  ],
                  [15,"SINDHUDURG"  ],
                  [15,"SOLAPUR"  ],
                  [15,"THANE"  ],
                  [15,"WARDHA"  ],
                  [15,"WASHIM"  ],
                  [15,"YAVATMAL"  ],
                  [16,"BISHNUPUR"  ],
                  [16,"CHANDEL"  ],
                  [16,"CHURACHANDPUR"  ],
                  [16,"IMPHAL EAST"  ],
                  [16,"IMPHAL WEST"  ],
                  [16,"SENAPATI"  ],
                  [16,"TAMENGLONG"  ],
                  [16,"THOUBAL"  ],
                  [16,"UKHRUL"  ],
                  [17,"EAST GARO HILLS"  ],
                  [17,"EAST JAINTIA HILLS"  ],
                  [17,"EAST KHASI HILLS"  ],
                  [17,"NORTH GARO HILLS"  ],
                  [17,"RI BHOI"  ],
                  [17,"SOUTH GARO HILLS"  ],
                  [17,"SOUTH WEST GARO HILLS"  ],
                  [17,"SOUTH WEST KHASI HILLS"  ],
                  [17,"WEST GARO HILLS"  ],
                  [17,"WEST JAINTIA HILLS"  ],
                  [17,"WEST KHASI HILLS"  ],
                  [18,"AIZAWL"  ],
                  [18,"CHAMPHAI"  ],
                  [18,"KOLASIB"  ],
                  [18,"LAWNGTLAI"  ],
                  [18,"LUNGLEI"  ],
                  [18,"MAMIT"  ],
                  [18,"SAIHA"  ],
                  [18,"SERCHHIP"  ],
                  [19,"DIMAPUR"  ],
                  [19,"KIPHIRE"  ],
                  [19,"KOHIMA"  ],
                  [19,"LONGLENG"  ],
                  [19,"MOKOKCHUNG"  ],
                  [19,"MON"  ],
                  [19,"PEREN"  ],
                  [19,"PHEK"  ],
                  [19,"TUENSANG"  ],
                  [19,"WOKHA"  ],
                  [19,"ZUNHEBOTO"  ],
                  [20,"ANUGUL"  ],
                  [20,"BALANGIR"  ],
                  [20,"BALESHWAR"  ],
                  [20,"BARGARH"  ],
                  [20,"BHADRAK"  ],
                  [20,"BOUDH"  ],
                  [20,"CUTTACK"  ],
                  [20,"DEOGARH"  ],
                  [20,"DHENKANAL"  ],
                  [20,"GAJAPATI"  ],
                  [20,"GANJAM"  ],
                  [20,"JAGATSINGHAPUR"  ],
                  [20,"JAJAPUR"  ],
                  [20,"JHARSUGUDA"  ],
                  [20,"KALAHANDI"  ],
                  [20,"KANDHAMAL"  ],
                  [20,"KENDRAPARA"  ],
                  [20,"KENDUJHAR"  ],
                  [20,"KHORDHA"  ],
                  [20,"KORAPUT"  ],
                  [20,"MALKANGIRI"  ],
                  [20,"MAYURBHANJ"  ],
                  [20,"NABARANGPUR"  ],
                  [20,"NAYAGARH"  ],
                  [20,"NUAPADA"  ],
                  [20,"PURI"  ],
                  [20,"RAYAGADA"  ],
                  [20,"SAMBALPUR"  ],
                  [20,"SONEPUR"  ],
                  [20,"SUNDARGARH"  ],
                  [21,"AMRITSAR"  ],
                  [21,"BARNALA"  ],
                  [21,"BATHINDA"  ],
                  [21,"FARIDKOT"  ],
                  [21,"FATEHGARH SAHIB"  ],
                  [21,"FAZILKA"  ],
                  [21,"FIROZEPUR"  ],
                  [21,"GURDASPUR"  ],
                  [21,"HOSHIARPUR"  ],
                  [21,"JALANDHAR"  ],
                  [21,"KAPURTHALA"  ],
                  [21,"LUDHIANA"  ],
                  [21,"MANSA"  ],
                  [21,"MOGA"  ],
                  [21,"NAWANSHAHR"  ],
                  [21,"PATHANKOT"  ],
                  [21,"PATIALA"  ],
                  [21,"RUPNAGAR"  ],
                  [21,"SANGRUR"  ],
                  [21,"S.A.S Nagar"  ],
                  [21,"SRI MUKTSAR SAHIB"  ],
                  [21,"Tarn Taran"  ],
                  [22,"AJMER"  ],
                  [22,"ALWAR"  ],
                  [22,"BANSWARA"  ],
                  [22,"BARAN"  ],
                  [22,"BARMER"  ],
                  [22,"BHARATPUR"  ],
                  [22,"BHILWARA"  ],
                  [22,"BIKANER"  ],
                  [22,"BUNDI"  ],
                  [22,"CHITTORGARH"  ],
                  [22,"CHURU"  ],
                  [22,"DAUSA"  ],
                  [22,"DHOLPUR"  ],
                  [22,"DUNGARPUR"  ],
                  [22,"GANGANAGAR"  ],
                  [22,"HANUMANGARH"  ],
                  [22,"JAIPUR"  ],
                  [22,"JAISALMER"  ],
                  [22,"JALORE"  ],
                  [22,"JHALAWAR"  ],
                  [22,"JHUNJHUNU"  ],
                  [22,"JODHPUR"  ],
                  [22,"KARAULI"  ],
                  [22,"KOTA"  ],
                  [22,"NAGAUR"  ],
                  [22,"PALI"  ],
                  [22,"PRATAPGARH"  ],
                  [22,"RAJSAMAND"  ],
                  [22,"SAWAI MADHOPUR"  ],
                  [22,"SIKAR"  ],
                  [22,"SIROHI"  ],
                  [22,"TONK"  ],
                  [22,"UDAIPUR"  ],
                  [23,"EAST DISTRICT"  ],
                  [23,"NORTH DISTRICT"  ],
                  [23,"SOUTH DISTRICT"  ],
                  [23,"WEST DISTRICT"  ],
                  [24,"Ariyalur"  ],
                  [24,"CHENNAI"  ],
                  [24,"COIMBATORE"  ],
                  [24,"CUDDALORE"  ],
                  [24,"DHARMAPURI"  ],
                  [24,"DINDIGUL"  ],
                  [24,"ERODE"  ],
                  [24,"KANCHIPURAM"  ],
                  [24,"KANNIYAKUMARI"  ],
                  [24,"KARUR"  ],
                  [24,"KRISHNAGIRI"  ],
                  [24,"MADURAI"  ],
                  [24,"NAGAPATTINAM"  ],
                  [24,"NAMAKKAL"  ],
                  [24,"PERAMBALUR"  ],
                  [24,"PUDUKKOTTAI"  ],
                  [24,"RAMANATHAPURAM"  ],
                  [24,"SALEM"  ],
                  [24,"SIVAGANGA"  ],
                  [24,"THANJAVUR"  ],
                  [24,"THENI"  ],
                  [24,"THE NILGIRIS"  ],
                  [24,"THIRUVALLUR"  ],
                  [24,"THIRUVARUR"  ],
                  [24,"TIRUCHIRAPPALLI"  ],
                  [24,"TIRUNELVELI"  ],
                  [24,"TIRUPPUR"  ],
                  [24,"TIRUVANNAMALAI"  ],
                  [24,"TUTICORIN"  ],
                  [24,"VELLORE"  ],
                  [24,"VILLUPURAM"  ],
                  [24,"VIRUDHUNAGAR"  ],
                  [25,"ADILABAD"  ],
                  [25,"BHADRADRI"  ],
                  [25,"HYDERABAD"  ],
                  [25,"Jagitial"  ],
                  [25,"JANGOAN"  ],
                  [25,"JAYASHANKAR"  ],
                  [25,"JOGULAMBA"  ],
                  [25,"KAMAREDDY"  ],
                  [25,"KARIMNAGAR"  ],
                  [25,"KHAMMAM"  ],
                  [25,"KOMARAM BHEEM ASIFABAD"  ],
                  [25,"MAHABUBABAD"  ],
                  [25,"MAHBUBNAGAR"  ],
                  [25,"MANCHERIAL"  ],
                  [25,"MEDAK"  ],
                  [25,"MEDCHAL"  ],
                  [25,"NAGARKURNOOL"  ],
                  [25,"NALGONDA"  ],
                  [25,"Nirmal"  ],
                  [25,"NIZAMABAD"  ],
                  [25,"PEDDAPALLI"  ],
                  [25,"RAJANNA"  ],
                  [25,"RANGAREDDI"  ],
                  [25,"SANGAREDDY"  ],
                  [25,"SIDDIPET"  ],
                  [25,"SURYAPET"  ],
                  [25,"VIKARABAD"  ],
                  [25,"WANAPARTHY"  ],
                  [25,"WARANGAL"  ],
                  [25,"WARANGAL URBAN"  ],
                  [25,"YADADRI"  ],
                  [26,"Dhalai"  ],
                  [26,"Gomati"  ],
                  [26,"Khowai"  ],
                  [26,"North Tripura"  ],
                  [26,"Sepahijala"  ],
                  [26,"South Tripura"  ],
                  [26,"Unakoti"  ],
                  [26,"West Tripura"  ],
                  [27,"ALMORA"  ],
                  [27,"BAGESHWAR"  ],
                  [27,"CHAMOLI"  ],
                  [27,"CHAMPAWAT"  ],
                  [27,"DEHRADUN"  ],
                  [27,"HARIDWAR"  ],
                  [27,"NAINITAL"  ],
                  [27,"PAURI GARHWAL"  ],
                  [27,"PITHORAGARH"  ],
                  [27,"RUDRA PRAYAG"  ],
                  [27,"TEHRI GARHWAL"  ],
                  [27,"UDAM SINGH NAGAR"  ],
                  [27,"UTTAR KASHI"  ],
                  [28,"AGRA"  ],
                  [28,"ALIGARH"  ],
                  [28,"ALLAHABAD"  ],
                  [28,"AMBEDKAR NAGAR"  ],
                  [28,"Amethi"  ],
                  [28,"AMROHA"  ],
                  [28,"AURAIYA"  ],
                  [28,"AZAMGARH"  ],
                  [28,"BAGHPAT"  ],
                  [28,"BAHRAICH"  ],
                  [28,"BALLIA"  ],
                  [28,"BALRAMPUR"  ],
                  [28,"BANDA"  ],
                  [28,"BARABANKI"  ],
                  [28,"BAREILLY"  ],
                  [28,"BASTI"  ],
                  [28,"BHADOHI"  ],
                  [28,"BIJNOR"  ],
                  [28,"BUDAUN"  ],
                  [28,"BULANDSHAHR"  ],
                  [28,"CHANDAULI"  ],
                  [28,"CHITRAKOOT"  ],
                  [28,"DEORIA"  ],
                  [28,"ETAH"  ],
                  [28,"ETAWAH"  ],
                  [28,"FAIZABAD"  ],
                  [28,"FARRUKHABAD"  ],
                  [28,"FATEHPUR"  ],
                  [28,"FIROZABAD"  ],
                  [28,"GAUTAM BUDDHA NAGAR"  ],
                  [28,"GHAZIABAD"  ],
                  [28,"GHAZIPUR"  ],
                  [28,"GONDA"  ],
                  [28,"GORAKHPUR"  ],
                  [28,"HAMIRPUR"  ],
                  [28,"HAPUR"  ],
                  [28,"HARDOI"  ],
                  [28,"HATHRAS"  ],
                  [28,"JALAUN"  ],
                  [28,"JAUNPUR"  ],
                  [28,"JHANSI"  ],
                  [28,"KANNAUJ"  ],
                  [28,"KANPUR DEHAT"  ],
                  [28,"KANPUR NAGAR"  ],
                  [28,"Kasganj"  ],
                  [28,"KAUSHAMBI"  ],
                  [28,"KHERI"  ],
                  [28,"KUSHI NAGAR"  ],
                  [28,"LALITPUR"  ],
                  [28,"LUCKNOW"  ],
                  [28,"MAHARAJGANJ"  ],
                  [28,"MAHOBA"  ],
                  [28,"MAINPURI"  ],
                  [28,"MATHURA"  ],
                  [28,"MAU"  ],
                  [28,"MEERUT"  ],
                  [28,"MIRZAPUR"  ],
                  [28,"MORADABAD"  ],
                  [28,"MUZAFFARNAGAR"  ],
                  [28,"PILIBHIT"  ],
                  [28,"PRATAPGARH"  ],
                  [28,"RAE BARELI"  ],
                  [28,"RAMPUR"  ],
                  [28,"SAHARANPUR"  ],
                  [28,"SAMBHAL"  ],
                  [28,"SANT KABEER NAGAR"  ],
                  [28,"SHAHJAHANPUR"  ],
                  [28,"SHAMLI"  ],
                  [28,"SHRAVASTI"  ],
                  [28,"SIDDHARTH NAGAR"  ],
                  [28,"SITAPUR"  ],
                  [28,"SONBHADRA"  ],
                  [28,"SULTANPUR"  ],
                  [28,"UNNAO"  ],
                  [28,"VARANASI"  ],
                  [29,"24 PARAGANAS NORTH"  ],
                  [29,"24 PARAGANAS SOUTH"  ],
                  [29,"Alipurduar"  ],
                  [29,"BANKURA"  ],
                  [29,"BARDHAMAN"  ],
                  [29,"BIRBHUM"  ],
                  [29,"COOCHBEHAR"  ],
                  [29,"DARJEELING"  ],
                  [29,"DINAJPUR DAKSHIN"  ],
                  [29,"DINAJPUR UTTAR"  ],
                  [29,"HOOGHLY"  ],
                  [29,"HOWRAH"  ],
                  [29,"JALPAIGURI"  ],
                  [29,"KOLKATA"  ],
                  [29,"MALDAH"  ],
                  [29,"MEDINIPUR EAST"  ],
                  [29,"MEDINIPUR WEST"  ],
                  [29,"MURSHIDABAD"  ],
                  [29,"NADIA"  ],
                  [29,"PURULIA"  ],
                  [30,"NICOBARS"  ],
                  [30,"NORTH AND MIDDLE ANDAMAN"  ],
                  [30,"SOUTH ANDAMANS"  ],
                  [31,"CHANDIGARH"  ],
                  [32,"DADRA AND NAGAR HAVELI"  ],
                  [33,"DAMAN"  ],
                  [33,"DIU"  ],
                  [34,"CENTRAL"  ],
                  [34,"EAST"  ],
                  [34,"NEW DELHI"  ],
                  [34,"NORTH"  ],
                  [34,"NORTH EAST"  ],
                  [34,"NORTH WEST"  ],
                  [34,"SHAHDARA"  ],
                  [34,"SOUTH"  ],
                  [34,"South East"  ],
                  [34,"SOUTH WEST"  ],
                  [34,"WEST"  ],
                  [35,"LAKSHADWEEP DISTRICT"  ],
                  [36,"KARAIKAL"  ],
                  [36,"MAHE"  ],
                  [36,"PONDICHERRY"  ],
                  [36,"YANAM"  ]
                ];
       foreach ($array as $key => $value):
            $array2[] = [
            'district_name'       => $value[1],
            'state_id'       => $value[0],
              
                ];
        endforeach ;
        Districts::insert($array2);
    }
}