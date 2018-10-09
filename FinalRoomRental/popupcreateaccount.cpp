#include "popupcreateaccount.h"
#include "ui_popupcreateaccount.h"
#include "rents.h"

PopUpCreateAccount::PopUpCreateAccount(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::PopUpCreateAccount)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/ddd");
    ui->label_2->setPixmap(pix);
}

PopUpCreateAccount::~PopUpCreateAccount()
{
    delete ui;
}

void PopUpCreateAccount::on_pushButton_clicked()
{
    AdminGuest *aG=new AdminGuest;
    this->hide();
    aG->show();
}
