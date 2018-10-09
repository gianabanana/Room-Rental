#ifndef POPUPCREATEACCOUNT_H
#define POPUPCREATEACCOUNT_H

#include <QWidget>

namespace Ui {
class PopUpCreateAccount;
}

class PopUpCreateAccount : public QWidget
{
    Q_OBJECT

public:
    explicit PopUpCreateAccount(QWidget *parent = 0);
    ~PopUpCreateAccount();

private slots:
    void on_pushButton_clicked();

private:
    Ui::PopUpCreateAccount *ui;
};

#endif // POPUPCREATEACCOUNT_H
