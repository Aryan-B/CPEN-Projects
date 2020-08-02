#define _CRT_SECURE_NO_WARNINGS
#include<stdio.h>
#include<stdlib.h>
#include<conio.h>
#include<math.h>

int main(void) {
	FILE *input;
	input = fopen("..//input.txt", "r");
	char c;
	int count=0;
	for (c = getc(input); c != EOF; c = getc(input)) {
		if (c == '\n') { 
			count = count + 1;
		}
	}
	fclose(input);



	FILE *output1;
	FILE *output2;
	input = fopen("..//input.txt", "r");
	output1 = fopen("..//dates.txt", "w");
	output2 = fopen("..//amount.txt", "w");


	int date;
	int year;
	double amount;
	char month[30];

	int pdate;
	int pyear;
	double pamount;

	//================================================================


	int lineNo = 1;
	int flag = 1;

	while (lineNo < count) {


		fscanf(input, "%d-%[^-]-%d$%lf\n", &date, month, &year, &amount);
		fscanf(input, "%*[^\n]\n");
		fscanf(input, "%*[^\n]\n");
		amount = amount * (-1);

		if (flag % 2 != 0) {
			pdate = date;
			pyear = year;
			pamount = amount;

			
			fprintf(output1, "%d-%s-%d\n", date, month, year);

			flag++;
		}
		else {



			if (pdate == date && pyear == year) {
				pamount += amount;

			}
			else {


				fprintf(output1, "%d-%s-%d\n", date, month, year);
				fprintf(output2, "%5.2lf\n", pamount);
				pamount = amount;
				pdate = date;
				pyear = year;

			}
		}

		





		lineNo+=3;
	}

	fprintf(output2, "%5.2lf\n", pamount);

	//=================================================================



	fclose(input);
	fclose(output1);
	fclose(output2);


	system("pause");
	return 0;
}