#include "adminguest.h"
#include "ui_adminguest.h"
#include "rents.h"

AdminGuest::AdminGuest(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::AdminGuest)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/aaa");
    ui->label_2->setPixmap(pix);
}

AdminGuest::~AdminGuest()
{
    delete ui;
}

void AdminGuest::on_admin_clicked()
{
    Login *l=new Login;
    this->hide();
    l->show();
}

void AdminGuest::on_boarder_clicked()
{
    Login2 *l2=new Login2;
    this->hide();
    l2->show();
}

void AdminGuest::on_exit_clicked()
{
    this->hide();
}
