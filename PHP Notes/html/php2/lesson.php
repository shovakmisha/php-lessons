<?php

// ����� ������ ����� ���� � ����� � ����� ��������

$line = [];

while( $line = fgetss($fail) ){
	$lines[] = $line;
}
// ������� � ��. ���������, �������...

	SELECT t.name, t.code, l.course // �� ���� SQL ��� ����쳺 �������� t
		RFOM teachers t // � ������� teachers ������ ����� ��������� t
		INNER JOIN lessons l ON t.id = l.tid // ��������� �������, � ��� ����� ���� ������ ���� name � code � teachers. � ���� course � lessons. �-��� ����� ���� �������� �� �-�� ���������.

?>