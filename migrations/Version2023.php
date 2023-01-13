<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * 
 */
final class Version2023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weatherData (
                        id INT AUTO_INCREMENT NOT NULL, 
                        date DATETIME NOT NULL, 
                        city VARCHAR(100) NOT NULL, 
                        countryCode VARCHAR(5) NOT NULL, 
                        weatherDescription VARCHAR(100), 
                        temperature FLOAT NOT NULL, 
                        humidity FLOAT NOT NULL, 
                        pressure FLOAT NOT NULL,
                        status VARCHAR(255) NOT NULL, 
                        PRIMARY KEY(id)) 
                        DEFAULT CHARACTER SET utf8mb4 
                        COLLATE `utf8mb4_unicode_ci` 
                        ENGINE = InnoDB');

        $this->addSql('CREATE TABLE CountryList (
                        id INT AUTO_INCREMENT NOT NULL, 
                        name VARCHAR(100) NOT NULL, 
                        code VARCHAR(2) NOT NULL,
                        PRIMARY KEY(id)) 
                        DEFAULT CHARACTER SET utf8mb4 
                        COLLATE `utf8mb4_unicode_ci` 
                        ENGINE = InnoDB');
        
        $this->addSql("INSERT INTO CountryList (name, code) VALUES ('Afghanistan', 'AF');
                        INSERT INTO CountryList (name, code) VALUES ('Albania', 'AL');
                        INSERT INTO CountryList (name, code) VALUES ('Algeria', 'DZ');
                        INSERT INTO CountryList (name, code) VALUES ('American Samoa', 'AS');
                        INSERT INTO CountryList (name, code) VALUES ('Andorra', 'AD');
                        INSERT INTO CountryList (name, code) VALUES ('Angola', 'AO');
                        INSERT INTO CountryList (name, code) VALUES ('Anguilla', 'AI');
                        INSERT INTO CountryList (name, code) VALUES ('Antarctica', 'AQ');
                        INSERT INTO CountryList (name, code) VALUES ('Antigua and Barbuda', 'AG');
                        INSERT INTO CountryList (name, code) VALUES ('Argentina', 'AR');
                        INSERT INTO CountryList (name, code) VALUES ('Armenia', 'AM');
                        INSERT INTO CountryList (name, code) VALUES ('Aruba', 'AW');
                        INSERT INTO CountryList (name, code) VALUES ('Australia', 'AU');
                        INSERT INTO CountryList (name, code) VALUES ('Austria', 'AT');
                        INSERT INTO CountryList (name, code) VALUES ('Azerbaijan', 'AZ');
                        INSERT INTO CountryList (name, code) VALUES ('Bahamas', 'BS');
                        INSERT INTO CountryList (name, code) VALUES ('Bahrain', 'BH');
                        INSERT INTO CountryList (name, code) VALUES ('Bangladesh', 'BD');
                        INSERT INTO CountryList (name, code) VALUES ('Barbados', 'BB');
                        INSERT INTO CountryList (name, code) VALUES ('Belarus', 'BY');
                        INSERT INTO CountryList (name, code) VALUES ('Belgium', 'BE');
                        INSERT INTO CountryList (name, code) VALUES ('Belize', 'BZ');
                        INSERT INTO CountryList (name, code) VALUES ('Benin', 'BJ');
                        INSERT INTO CountryList (name, code) VALUES ('Bermuda', 'BM');
                        INSERT INTO CountryList (name, code) VALUES ('Bhutan', 'BT');
                        INSERT INTO CountryList (name, code) VALUES ('Bosnia and Herzegovina', 'BA');
                        INSERT INTO CountryList (name, code) VALUES ('Botswana', 'BW');
                        INSERT INTO CountryList (name, code) VALUES ('Bouvet Island', 'BV');
                        INSERT INTO CountryList (name, code) VALUES ('Brazil', 'BR');
                        INSERT INTO CountryList (name, code) VALUES ('British Indian Ocean Territory', 'IO');
                        INSERT INTO CountryList (name, code) VALUES ('Brunei Darussalam', 'BN');
                        INSERT INTO CountryList (name, code) VALUES ('Bulgaria', 'BG');
                        INSERT INTO CountryList (name, code) VALUES ('Burkina Faso', 'BF');
                        INSERT INTO CountryList (name, code) VALUES ('Burundi', 'BI');
                        INSERT INTO CountryList (name, code) VALUES ('Cambodia', 'KH');
                        INSERT INTO CountryList (name, code) VALUES ('Cameroon', 'CM');
                        INSERT INTO CountryList (name, code) VALUES ('Canada', 'CA');
                        INSERT INTO CountryList (name, code) VALUES ('Cape Verde', 'CV');
                        INSERT INTO CountryList (name, code) VALUES ('Cayman Islands', 'KY');
                        INSERT INTO CountryList (name, code) VALUES ('Central African Republic', 'CF');
                        INSERT INTO CountryList (name, code) VALUES ('Chad', 'TD');
                        INSERT INTO CountryList (name, code) VALUES ('Chile', 'CL');
                        INSERT INTO CountryList (name, code) VALUES ('China', 'CN');
                        INSERT INTO CountryList (name, code) VALUES ('Christmas Island', 'CX');
                        INSERT INTO CountryList (name, code) VALUES ('Cocos (Keeling) Islands', 'CC');
                        INSERT INTO CountryList (name, code) VALUES ('Colombia', 'CO');
                        INSERT INTO CountryList (name, code) VALUES ('Comoros', 'KM');
                        INSERT INTO CountryList (name, code) VALUES ('Congo', 'CG');
                        INSERT INTO CountryList (name, code) VALUES ('Cook Islands', 'CK');
                        INSERT INTO CountryList (name, code) VALUES ('Costa Rica', 'CR');
                        INSERT INTO CountryList (name, code) VALUES ('Croatia', 'HR');
                        INSERT INTO CountryList (name, code) VALUES ('Cuba', 'CU');
                        INSERT INTO CountryList (name, code) VALUES ('Cyprus', 'CY');
                        INSERT INTO CountryList (name, code) VALUES ('Czech Republic', 'CZ');
                        INSERT INTO CountryList (name, code) VALUES ('Denmark', 'DK');
                        INSERT INTO CountryList (name, code) VALUES ('Djibouti', 'DJ');
                        INSERT INTO CountryList (name, code) VALUES ('Dominica', 'DM');
                        INSERT INTO CountryList (name, code) VALUES ('Dominican Republic', 'DO');
                        INSERT INTO CountryList (name, code) VALUES ('Ecuador', 'EC');
                        INSERT INTO CountryList (name, code) VALUES ('Egypt', 'EG');
                        INSERT INTO CountryList (name, code) VALUES ('El Salvador', 'SV');
                        INSERT INTO CountryList (name, code) VALUES ('Equatorial Guinea', 'GQ');
                        INSERT INTO CountryList (name, code) VALUES ('Eritrea', 'ER');
                        INSERT INTO CountryList (name, code) VALUES ('Estonia', 'EE');
                        INSERT INTO CountryList (name, code) VALUES ('Ethiopia', 'ET');
                        INSERT INTO CountryList (name, code) VALUES ('Falkland Islands (Malvinas)' ,'FK');
                        INSERT INTO CountryList (name, code) VALUES ('Faroe Islands', 'FO');
                        INSERT INTO CountryList (name, code) VALUES ('Fiji', 'FJ');
                        INSERT INTO CountryList (name, code) VALUES ('Finland', 'FI');
                        INSERT INTO CountryList (name, code) VALUES ('France', 'FR');
                        INSERT INTO CountryList (name, code) VALUES ('French Guiana', 'GF');
                        INSERT INTO CountryList (name, code) VALUES ('French Polynesia', 'PF');
                        INSERT INTO CountryList (name, code) VALUES ('French Southern Territories', 'TF');
                        INSERT INTO CountryList (name, code) VALUES ('Gabon', 'GA');
                        INSERT INTO CountryList (name, code) VALUES ('Gambia', 'GM');
                        INSERT INTO CountryList (name, code) VALUES ('Georgia', 'GE');
                        INSERT INTO CountryList (name, code) VALUES ('Germany', 'DE');
                        INSERT INTO CountryList (name, code) VALUES ('Ghana', 'GH');
                        INSERT INTO CountryList (name, code) VALUES ('Gibraltar', 'GI');
                        INSERT INTO CountryList (name, code) VALUES ('Greece', 'GR');
                        INSERT INTO CountryList (name, code) VALUES ('Greenland', 'GL');
                        INSERT INTO CountryList (name, code) VALUES ('Grenada', 'GD');
                        INSERT INTO CountryList (name, code) VALUES ('Guadeloupe', 'GP');
                        INSERT INTO CountryList (name, code) VALUES ('Guam', 'GU');
                        INSERT INTO CountryList (name, code) VALUES ('Guatemala', 'GT');
                        INSERT INTO CountryList (name, code) VALUES ('Guernsey', 'GG');
                        INSERT INTO CountryList (name, code) VALUES ('Guinea', 'GN');
                        INSERT INTO CountryList (name, code) VALUES ('Guinea-Bissau', 'GW');
                        INSERT INTO CountryList (name, code) VALUES ('Guyana', 'GY');
                        INSERT INTO CountryList (name, code) VALUES ('Haiti', 'HT');
                        INSERT INTO CountryList (name, code) VALUES ('Heard Island and McDonald Islands', 'HM');
                        INSERT INTO CountryList (name, code) VALUES ('Holy See (Vatican City State)' ,'VA');
                        INSERT INTO CountryList (name, code) VALUES ('Honduras', 'HN');
                        INSERT INTO CountryList (name, code) VALUES ('Hong Kong', 'HK');
                        INSERT INTO CountryList (name, code) VALUES ('Hungary', 'HU');
                        INSERT INTO CountryList (name, code) VALUES ('Iceland', 'IS');
                        INSERT INTO CountryList (name, code) VALUES ('India', 'IN');
                        INSERT INTO CountryList (name, code) VALUES ('Indonesia', 'ID');
                        INSERT INTO CountryList (name, code) VALUES ('Iraq', 'IQ');
                        INSERT INTO CountryList (name, code) VALUES ('Ireland', 'IE');
                        INSERT INTO CountryList (name, code) VALUES ('Isle of Man', 'IM');
                        INSERT INTO CountryList (name, code) VALUES ('Israel', 'IL');
                        INSERT INTO CountryList (name, code) VALUES ('Italy', 'IT');
                        INSERT INTO CountryList (name, code) VALUES ('Jamaica', 'JM');
                        INSERT INTO CountryList (name, code) VALUES ('Japan', 'JP');
                        INSERT INTO CountryList (name, code) VALUES ('Jersey', 'JE');
                        INSERT INTO CountryList (name, code) VALUES ('Jordan', 'JO');
                        INSERT INTO CountryList (name, code) VALUES ('Kazakhstan', 'KZ');
                        INSERT INTO CountryList (name, code) VALUES ('Kenya', 'KE');
                        INSERT INTO CountryList (name, code) VALUES ('Kiribati', 'KI');
                        INSERT INTO CountryList (name, code) VALUES ('Kuwait', 'KW');
                        INSERT INTO CountryList (name, code) VALUES ('Kyrgyzstan', 'KG');
                        INSERT INTO CountryList (name, code) VALUES ('Lao Peoples Democratic Republic', 'LA');
                        INSERT INTO CountryList (name, code) VALUES ('Latvia', 'LV');
                        INSERT INTO CountryList (name, code) VALUES ('Lebanon', 'LB');
                        INSERT INTO CountryList (name, code) VALUES ('Lesotho', 'LS');
                        INSERT INTO CountryList (name, code) VALUES ('Liberia', 'LR');
                        INSERT INTO CountryList (name, code) VALUES ('Libya', 'LY');
                        INSERT INTO CountryList (name, code) VALUES ('Liechtenstein', 'LI');
                        INSERT INTO CountryList (name, code) VALUES ('Lithuania', 'LT');
                        INSERT INTO CountryList (name, code) VALUES ('Luxembourg', 'LU');
                        INSERT INTO CountryList (name, code) VALUES ('Macao', 'MO');
                        INSERT INTO CountryList (name, code) VALUES ('Madagascar', 'MG');
                        INSERT INTO CountryList (name, code) VALUES ('Malawi', 'MW');
                        INSERT INTO CountryList (name, code) VALUES ('Malaysia', 'MY');
                        INSERT INTO CountryList (name, code) VALUES ('Maldives', 'MV');
                        INSERT INTO CountryList (name, code) VALUES ('Mali', 'ML');
                        INSERT INTO CountryList (name, code) VALUES ('Malta', 'MT');
                        INSERT INTO CountryList (name, code) VALUES ('Marshall Islands', 'MH');
                        INSERT INTO CountryList (name, code) VALUES ('Martinique', 'MQ');
                        INSERT INTO CountryList (name, code) VALUES ('Mauritania', 'MR');
                        INSERT INTO CountryList (name, code) VALUES ('Mauritius', 'MU');
                        INSERT INTO CountryList (name, code) VALUES ('Mayotte', 'YT');
                        INSERT INTO CountryList (name, code) VALUES ('Mexico', 'MX');
                        INSERT INTO CountryList (name, code) VALUES ('Monaco', 'MC');
                        INSERT INTO CountryList (name, code) VALUES ('Mongolia', 'MN');
                        INSERT INTO CountryList (name, code) VALUES ('Montenegro', 'ME');
                        INSERT INTO CountryList (name, code) VALUES ('Montserrat', 'MS');
                        INSERT INTO CountryList (name, code) VALUES ('Morocco', 'MA');
                        INSERT INTO CountryList (name, code) VALUES ('Mozambique', 'MZ');
                        INSERT INTO CountryList (name, code) VALUES ('Myanmar', 'MM');
                        INSERT INTO CountryList (name, code) VALUES ('Namibia', 'NA');
                        INSERT INTO CountryList (name, code) VALUES ('Nauru', 'NR');
                        INSERT INTO CountryList (name, code) VALUES ('Nepal', 'NP');
                        INSERT INTO CountryList (name, code) VALUES ('Netherlands', 'NL');
                        INSERT INTO CountryList (name, code) VALUES ('New Caledonia', 'NC');
                        INSERT INTO CountryList (name, code) VALUES ('New Zealand', 'NZ');
                        INSERT INTO CountryList (name, code) VALUES ('Nicaragua', 'NI');
                        INSERT INTO CountryList (name, code) VALUES ('Niger', 'NE');
                        INSERT INTO CountryList (name, code) VALUES ('Nigeria', 'NG');
                        INSERT INTO CountryList (name, code) VALUES ('Niue', 'NU');
                        INSERT INTO CountryList (name, code) VALUES ('Norfolk Island', 'NF');
                        INSERT INTO CountryList (name, code) VALUES ('Northern Mariana Islands', 'MP');
                        INSERT INTO CountryList (name, code) VALUES ('Norway', 'NO');
                        INSERT INTO CountryList (name, code) VALUES ('Oman', 'OM');
                        INSERT INTO CountryList (name, code) VALUES ('Pakistan', 'PK');
                        INSERT INTO CountryList (name, code) VALUES ('Palau', 'PW');
                        INSERT INTO CountryList (name, code) VALUES ('Panama', 'PA');
                        INSERT INTO CountryList (name, code) VALUES ('Papua New Guinea', 'PG');
                        INSERT INTO CountryList (name, code) VALUES ('Paraguay', 'PY');
                        INSERT INTO CountryList (name, code) VALUES ('Peru', 'PE');
                        INSERT INTO CountryList (name, code) VALUES ('Philippines', 'PH');
                        INSERT INTO CountryList (name, code) VALUES ('Pitcairn', 'PN');
                        INSERT INTO CountryList (name, code) VALUES ('Poland', 'PL');
                        INSERT INTO CountryList (name, code) VALUES ('Portugal', 'PT');
                        INSERT INTO CountryList (name, code) VALUES ('Puerto Rico', 'PR');
                        INSERT INTO CountryList (name, code) VALUES ('Qatar', 'QA');
                        INSERT INTO CountryList (name, code) VALUES ('Romania', 'RO');
                        INSERT INTO CountryList (name, code) VALUES ('Russian Federation', 'RU');
                        INSERT INTO CountryList (name, code) VALUES ('Rwanda', 'RW');
                        INSERT INTO CountryList (name, code) VALUES ('Saint Kitts and Nevis', 'KN');
                        INSERT INTO CountryList (name, code) VALUES ('Saint Lucia', 'LC');
                        INSERT INTO CountryList (name, code) VALUES ('Saint Martin (French part)' ,'MF');
                        INSERT INTO CountryList (name, code) VALUES ('Saint Pierre and Miquelon', 'PM');
                        INSERT INTO CountryList (name, code) VALUES ('Saint Vincent and the Grenadines', 'VC');
                        INSERT INTO CountryList (name, code) VALUES ('Samoa', 'WS');
                        INSERT INTO CountryList (name, code) VALUES ('San Marino', 'SM');
                        INSERT INTO CountryList (name, code) VALUES ('Sao Tome and Principe', 'ST');
                        INSERT INTO CountryList (name, code) VALUES ('Saudi Arabia', 'SA');
                        INSERT INTO CountryList (name, code) VALUES ('Senegal', 'SN');
                        INSERT INTO CountryList (name, code) VALUES ('Serbia', 'RS');
                        INSERT INTO CountryList (name, code) VALUES ('Seychelles', 'SC');
                        INSERT INTO CountryList (name, code) VALUES ('Sierra Leone', 'SL');
                        INSERT INTO CountryList (name, code) VALUES ('Singapore', 'SG');
                        INSERT INTO CountryList (name, code) VALUES ('Sint Maarten (Dutch part)' ,'SX');
                        INSERT INTO CountryList (name, code) VALUES ('Slovakia', 'SK');
                        INSERT INTO CountryList (name, code) VALUES ('Slovenia', 'SI');
                        INSERT INTO CountryList (name, code) VALUES ('Solomon Islands', 'SB');
                        INSERT INTO CountryList (name, code) VALUES ('Somalia', 'SO');
                        INSERT INTO CountryList (name, code) VALUES ('South Africa', 'ZA');
                        INSERT INTO CountryList (name, code) VALUES ('South Georgia and the South Sandwich Islands', 'GS');
                        INSERT INTO CountryList (name, code) VALUES ('South Sudan', 'SS');
                        INSERT INTO CountryList (name, code) VALUES ('Spain', 'ES');
                        INSERT INTO CountryList (name, code) VALUES ('Sri Lanka', 'LK');
                        INSERT INTO CountryList (name, code) VALUES ('Sudan', 'SD');
                        INSERT INTO CountryList (name, code) VALUES ('Suriname', 'SR');
                        INSERT INTO CountryList (name, code) VALUES ('Svalbard and Jan Mayen', 'SJ');
                        INSERT INTO CountryList (name, code) VALUES ('Swaziland', 'SZ');
                        INSERT INTO CountryList (name, code) VALUES ('Sweden', 'SE');
                        INSERT INTO CountryList (name, code) VALUES ('Switzerland', 'CH');
                        INSERT INTO CountryList (name, code) VALUES ('Syrian Arab Republic', 'SY');
                        INSERT INTO CountryList (name, code) VALUES ('Tajikistan', 'TJ');
                        INSERT INTO CountryList (name, code) VALUES ('Thailand', 'TH');
                        INSERT INTO CountryList (name, code) VALUES ('Timor-Leste', 'TL');
                        INSERT INTO CountryList (name, code) VALUES ('Togo', 'TG');
                        INSERT INTO CountryList (name, code) VALUES ('Tokelau', 'TK');
                        INSERT INTO CountryList (name, code) VALUES ('Tonga', 'TO');
                        INSERT INTO CountryList (name, code) VALUES ('Trinidad and Tobago', 'TT');
                        INSERT INTO CountryList (name, code) VALUES ('Tunisia', 'TN');
                        INSERT INTO CountryList (name, code) VALUES ('Turkey', 'TR');
                        INSERT INTO CountryList (name, code) VALUES ('Turkmenistan', 'TM');
                        INSERT INTO CountryList (name, code) VALUES ('Turks and Caicos Islands', 'TC');
                        INSERT INTO CountryList (name, code) VALUES ('Tuvalu', 'TV');
                        INSERT INTO CountryList (name, code) VALUES ('Uganda', 'UG');
                        INSERT INTO CountryList (name, code) VALUES ('Ukraine', 'UA');
                        INSERT INTO CountryList (name, code) VALUES ('United Arab Emirates', 'AE');
                        INSERT INTO CountryList (name, code) VALUES ('United Kingdom', 'GB');
                        INSERT INTO CountryList (name, code) VALUES ('United States', 'US');
                        INSERT INTO CountryList (name, code) VALUES ('United States Minor Outlying Islands', 'UM');
                        INSERT INTO CountryList (name, code) VALUES ('Uruguay', 'UY');
                        INSERT INTO CountryList (name, code) VALUES ('Uzbekistan', 'UZ');
                        INSERT INTO CountryList (name, code) VALUES ('Vanuatu', 'VU');
                        INSERT INTO CountryList (name, code) VALUES ('Viet Nam', 'VN');
                        INSERT INTO CountryList (name, code) VALUES ('Wallis and Futuna', 'WF');
                        INSERT INTO CountryList (name, code) VALUES ('Western Sahara', 'EH');
                        INSERT INTO CountryList (name, code) VALUES ('Yemen', 'YE');
                        INSERT INTO CountryList (name, code) VALUES ('Zambia', 'ZM');
                        INSERT INTO CountryList (name, code) VALUES ('Zimbabwe', 'ZW');
                        ");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
